<script setup>
import { Download, Users, Calendar, ShieldCheck, Mail, Phone, FileText } from 'lucide-vue-next';

defineProps({
  leads: Array,
});

const exportCsv = () => {
  window.location.href = '/admin/leads?senha=odisseia2024&export=csv';
};
</script>

<template>
  <div class="min-h-screen bg-[#F8F7F4] text-[#18232C] p-4 sm:p-8 font-sans">
    <div class="max-w-6xl mx-auto space-y-6">
      
      <!-- Top Bar -->
      <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white p-6 rounded-2xl border border-[#E9E2D3] shadow-sm">
        <div>
          <span class="text-xs font-bold text-[#B18A47] uppercase tracking-wider">Painel Administrativo</span>
          <h1 class="text-2xl font-serif font-bold text-[#0E2340]">Inscritos na Palestra Odisseia</h1>
          <p class="text-xs text-[#657078] mt-0.5">Angústia e Existência — Unidade Salgado Filho</p>
        </div>

        <div class="flex items-center gap-3">
          <div class="px-3.5 py-1.5 rounded-xl bg-[#091A2F] text-[#E7D7B5] text-xs font-bold flex items-center gap-1.5">
            <Users class="w-4 h-4 text-[#B18A47]" />
            <span>Total: {{ leads.length }} Leads</span>
          </div>

          <button 
            @click="exportCsv"
            class="btn-gold-cta px-4 py-2 rounded-xl text-xs font-bold flex items-center gap-2 cursor-pointer shadow-sm"
          >
            <Download class="w-4 h-4" />
            <span>EXPORTAR CSV</span>
          </button>
        </div>
      </div>

      <!-- Table Card -->
      <div class="bg-white rounded-2xl border border-[#E9E2D3] shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full text-left text-xs">
            <thead class="bg-[#091A2F] text-[#E7D7B5] uppercase font-bold text-[10px] tracking-wider">
              <tr>
                <th class="py-3.5 px-4">#</th>
                <th class="py-3.5 px-4">Nome</th>
                <th class="py-3.5 px-4">E-mail</th>
                <th class="py-3.5 px-4">WhatsApp</th>
                <th class="py-3.5 px-4">Data de Cadastro</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-[#E9E2D3]">
              <tr v-if="leads.length === 0">
                <td colspan="5" class="py-8 text-center text-[#657078]">
                  Nenhum lead cadastrado até o momento.
                </td>
              </tr>
              <tr v-for="lead in leads" :key="lead.id" class="hover:bg-[#F8F7F4] transition-colors">
                <td class="py-3 px-4 font-mono text-[#657078]">{{ lead.id }}</td>
                <td class="py-3 px-4 font-bold text-[#0E2340]">{{ lead.nome }}</td>
                <td class="py-3 px-4 text-[#18232C] flex items-center gap-1.5">
                  <Mail class="w-3.5 h-3.5 text-[#B18A47]" />
                  {{ lead.email }}
                </td>
                <td class="py-3 px-4 text-[#2E4A3D] font-medium">
                  <span v-if="lead.whatsapp" class="flex items-center gap-1">
                    <Phone class="w-3.5 h-3.5 text-[#2E4A3D]" />
                    {{ lead.whatsapp }}
                  </span>
                  <span v-else class="text-[#657078] font-normal">—</span>
                </td>
                <td class="py-3 px-4 text-[#657078]">
                  {{ new Date(lead.created_at).toLocaleString('pt-BR') }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</template>
