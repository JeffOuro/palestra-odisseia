<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use Inertia\Inertia;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp' => 'nullable|string|max:30',
        ], [
            'nome.required' => 'Por favor, informe seu nome completo.',
            'email.required' => 'Por favor, informe seu melhor e-mail.',
            'email.email' => 'Por favor, informe um e-mail válido.',
        ]);

        $cleanNome = trim(strip_tags($validated['nome']));
        $cleanEmail = strtolower(trim($validated['email']));
        $cleanWhatsapp = isset($validated['whatsapp']) ? trim(strip_tags($validated['whatsapp'])) : null;

        // Upsert lead data based on email to prevent duplicates and maintain integrity
        $lead = Lead::updateOrCreate(
            ['email' => $cleanEmail],
            [
                'nome' => $cleanNome,
                'whatsapp' => $cleanWhatsapp,
                'palestra_nome' => 'Angústia e Existência: uma leitura fenomenológico-existencial em Heidegger, Sartre e Camus',
                'ip_address' => $request->ip(),
            ]
        );

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Material liberado com sucesso!',
                'download_url' => asset('material-palestra-angustia-existencia.pdf'),
                'lead' => $lead,
            ]);
        }

        return back()->with('success', 'Cadastro realizado com sucesso! Seu material já está liberado.');
    }

    public function index(Request $request)
    {
        if ($request->query('senha') !== 'odisseia2024') {
            abort(403, 'Acesso não autorizado.');
        }

        $leads = Lead::orderBy('created_at', 'desc')->get();

        if ($request->query('export') === 'csv') {
            $csvHeader = ["ID", "Nome", "E-mail", "WhatsApp", "Palestra", "Data de Cadastro"];
            $csvRows = [];

            foreach ($leads as $l) {
                $csvRows[] = [
                    $l->id,
                    '"' . str_replace('"', '""', $l->nome) . '"',
                    '"' . str_replace('"', '""', $l->email) . '"',
                    '"' . str_replace('"', '""', $l->whatsapp) . '"',
                    '"' . str_replace('"', '""', $l->palestra_nome) . '"',
                    $l->created_at->format('Y-m-d H:i:s'),
                ];
            }

            $content = "\xEF\xBB\xBF"; // UTF-8 BOM for Excel compatibility
            $content .= implode(",", $csvHeader) . "\n";
            foreach ($csvRows as $row) {
                $content .= implode(",", $row) . "\n";
            }

            return response($content, 200, [
                'Content-Type' => 'text/csv; charset=UTF-8',
                'Content-Disposition' => 'attachment; filename="leads_palestra_odisseia.csv"',
            ]);
        }

        return Inertia::render('AdminLeads', [
            'leads' => $leads,
        ]);
    }
}
