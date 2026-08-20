<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import {
  Calendar,
  Clock,
  MapPin,
  Users,
  Award,
  FileText,
  CheckCircle2,
  ShieldCheck,
  BookOpen,
  ArrowRight,
  X,
  Sparkles,
  UserCheck,
  Download,
  Share2,
  Info,
  ExternalLink
} from 'lucide-vue-next';

const form = useForm({
  nome: '',
  email: '',
  whatsapp: '',
});

const isSubmitted = ref(false);
const downloadUrl = ref('/material-palestra-angustia-existencia.pdf');
const doityUrl = 'https://doity.com.br/2semanadepsicologia#registration';
const showDetailsModal = ref(false);

const applyPhoneMask = (e) => {
  let v = e.target.value.replace(/\D/g, '');
  if (v.length > 11) v = v.substring(0, 11);
  if (v.length > 10) {
    v = v.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
  } else if (v.length > 6) {
    v = v.replace(/^(\d{2})(\d{4})(\d{0,4})$/, '($1) $2-$3');
  } else if (v.length > 2) {
    v = v.replace(/^(\d{2})(\d{0,5})$/, '($1) $2');
  }
  form.whatsapp = v;
};

const submitForm = () => {
  form.post('/lead', {
    preserveScroll: true,
    onSuccess: (page) => {
      isSubmitted.value = true;
    },
    onError: (errors) => {
      console.log('Erro no formulário:', errors);
    }
  });
};

const handleImageError = (e) => {
  e.target.src = '/images/logo.png';
};
</script>

<template>
  <div class="min-h-screen bg-[#F8F7F4] text-[#18232C] flex flex-col justify-between selection:bg-[#B18A47] selection:text-white relative overflow-x-hidden font-sans">
    
    <!-- Top Decorative Line -->
    <div class="h-1.5 bg-gradient-to-r from-[#091A2F] via-[#B18A47] to-[#2E4A3D] w-full"></div>

    <!-- Header / Navbar -->
    <header class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-5 flex justify-between items-center z-10 shrink-0 border-b border-[#0E2340]/10">
      <div class="flex items-center gap-4">
        <img 
          src="/images/logo.png" 
          alt="Odisseia Filosófica" 
          class="h-14 sm:h-18 md:h-22 w-auto object-contain drop-shadow-xs transition-all duration-300"
          @error="handleImageError"
        />
        <div class="hidden sm:flex flex-col border-l border-[#B18A47]/40 pl-3.5">
          <span class="font-cinzel text-sm sm:text-base font-bold text-[#0E2340] tracking-wider uppercase">Odisseia Filosófica</span>
          <span class="text-xs text-[#6A5542] tracking-normal font-medium">Vida Intelectual & Autoconhecimento</span>
        </div>
      </div>

      <div class="flex items-center gap-2 sm:gap-3">
        <a 
          :href="doityUrl" 
          target="_blank"
          rel="noopener noreferrer"
          class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-[#0E2340] text-white hover:bg-[#091A2F] transition-colors shadow-xs"
        >
          <span>Inscrição Oficial no Evento</span>
          <ExternalLink class="w-3.5 h-3.5 text-[#B18A47]" />
        </a>
        <button 
          @click="showDetailsModal = true" 
          class="inline-flex items-center gap-1.5 text-xs font-semibold text-[#0E2340] hover:text-[#B18A47] transition-colors underline underline-offset-4"
        >
          <Info class="w-3.5 h-3.5" />
          Ver Ementa
        </button>
      </div>
    </header>

    <!-- MAIN SINGLE FOLD CONTAINER (1 Dobra) -->
    <main class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 lg:py-6 flex-grow flex items-center justify-center">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-center w-full">
        
        <!-- LEFT COLUMN: Event Content & Speaker -->
        <div class="lg:col-span-7 space-y-4 sm:space-y-5">
          
          <!-- Badge -->
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-[#091A2F] text-[#E7D7B5] text-xs font-bold tracking-wider uppercase shadow-sm">
            <Sparkles class="w-3.5 h-3.5 text-[#B18A47]" />
            <span>Palestra Presencial • UnP (Semana de Psicologia)</span>
          </div>

          <!-- Main Title -->
          <h1 class="text-2xl sm:text-3xl lg:text-4xl xl:text-[42px] font-serif font-bold text-[#0E2340] leading-[1.18] tracking-tight">
            Angústia e Existência:
            <span class="block text-[#B18A47] font-normal italic mt-0.5">
              uma leitura fenomenológico-existencial em Heidegger, Sartre e Camus
            </span>
          </h1>

          <!-- Concise Description -->
          <p class="text-sm sm:text-base text-[#18232C]/85 leading-relaxed font-normal max-w-2xl">
            Compreenda a angústia como dimensão fundamental da experiência humana. Diferencie-a do medo e da ansiedade, investigando seu papel na revelação da liberdade, da responsabilidade e do autoconhecimento na história do pensamento ocidental.
          </p>

          <!-- Quick Info Grid (Key Metrics) -->
          <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5 sm:gap-3 py-1">
            <div class="bg-white/80 backdrop-blur-xs p-2.5 rounded-xl border border-[#E9E2D3] shadow-xs flex items-center gap-2.5">
              <div class="p-2 rounded-lg bg-[#0E2340]/5 text-[#0E2340]">
                <Calendar class="w-4 h-4 text-[#B18A47]" />
              </div>
              <div>
                <span class="block text-[10px] text-[#657078] uppercase font-semibold">Data</span>
                <span class="text-xs sm:text-sm font-bold text-[#0E2340]">26 de Agosto</span>
              </div>
            </div>

            <div class="bg-white/80 backdrop-blur-xs p-2.5 rounded-xl border border-[#E9E2D3] shadow-xs flex items-center gap-2.5">
              <div class="p-2 rounded-lg bg-[#0E2340]/5 text-[#0E2340]">
                <Clock class="w-4 h-4 text-[#B18A47]" />
              </div>
              <div>
                <span class="block text-[10px] text-[#657078] uppercase font-semibold">Horário</span>
                <span class="text-xs sm:text-sm font-bold text-[#0E2340]">19h às 22h</span>
              </div>
            </div>

            <div class="bg-white/80 backdrop-blur-xs p-2.5 rounded-xl border border-[#E9E2D3] shadow-xs flex items-center gap-2.5">
              <div class="p-2 rounded-lg bg-[#0E2340]/5 text-[#0E2340]">
                <MapPin class="w-4 h-4 text-[#B18A47]" />
              </div>
              <div>
                <span class="block text-[10px] text-[#657078] uppercase font-semibold">Local</span>
                <span class="block text-xs sm:text-sm font-bold text-[#0E2340] leading-tight">UnP</span>
                <span class="block text-[11px] font-semibold text-[#0E2340] leading-tight">Salgado Filho</span>
              </div>
            </div>

            <div class="bg-white/80 backdrop-blur-xs p-2.5 rounded-xl border border-[#E9E2D3] shadow-xs flex items-center gap-2.5">
              <div class="p-2 rounded-lg bg-[#0E2340]/5 text-[#0E2340]">
                <Users class="w-4 h-4 text-[#2E4A3D]" />
              </div>
              <div>
                <span class="block text-[10px] text-[#657078] uppercase font-semibold">Vagas</span>
                <span class="text-xs sm:text-sm font-bold text-[#2E4A3D]">80 a 100 vagas</span>
              </div>
            </div>
          </div>

          <!-- Speaker Card -->
          <div class="bg-white p-3.5 sm:p-4 rounded-2xl border border-[#E9E2D3] shadow-sm flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
            <div class="flex items-center gap-3.5">
              <img 
                src="/images/jefferson.jpg" 
                alt="Jefferson Alves da Silva" 
                class="w-12 h-12 sm:w-14 sm:h-14 rounded-full object-cover border-2 border-[#B18A47] shrink-0 shadow-xs"
                @error="(e) => e.target.src = '/images/author-avatar.jpeg'"
              />
              <div>
                <div class="flex items-center gap-2">
                  <span class="text-xs font-semibold uppercase tracking-wider text-[#6A5542]">Palestrante</span>
                  <span class="inline-flex items-center gap-1 text-[11px] text-[#2E4A3D] font-medium bg-[#2E4A3D]/10 px-2 py-0.5 rounded-md">
                    <Award class="w-3 h-3" /> Com Certificado
                  </span>
                </div>
                <h3 class="text-base sm:text-lg font-bold text-[#0E2340]">Jefferson Alves da Silva</h3>
                <p class="text-xs text-[#657078] leading-normal mt-0.5">
                  Graduado em Farmácia, Filosofia e Ciências da Religião; Pós-Graduado em Ciências da Religião e Filosofia da Religião. Graduando em Psicologia.
                </p>
              </div>
            </div>

            <button 
              @click="showDetailsModal = true"
              class="w-full sm:w-auto px-3.5 py-1.5 rounded-lg border border-[#B18A47]/40 text-xs font-semibold text-[#0E2340] hover:bg-[#B18A47]/10 transition-colors flex items-center justify-center gap-1.5 shrink-0"
            >
              <span>Ver Currículo & Ementa</span>
              <ArrowRight class="w-3.5 h-3.5 text-[#B18A47]" />
            </button>
          </div>

        </div>

        <!-- RIGHT COLUMN: Lead Capture Form Card -->
        <div class="lg:col-span-5">
          <div class="bg-white rounded-3xl p-5 sm:p-7 border border-[#E9E2D3] shadow-navy-depth relative overflow-hidden">
            
            <!-- Card Ambient Glow -->
            <div class="absolute -top-12 -right-12 w-40 h-40 bg-[#B18A47]/10 rounded-full blur-2xl pointer-events-none"></div>

            <!-- SUCCESS STATE -->
            <div v-if="isSubmitted" class="py-4 text-center space-y-4">
              <div class="w-14 h-14 bg-[#2E4A3D]/10 rounded-full flex items-center justify-center mx-auto text-[#2E4A3D] border border-[#2E4A3D]/20 animate-bounce">
                <CheckCircle2 class="w-8 h-8" />
              </div>

              <div>
                <span class="text-xs font-bold text-[#2E4A3D] uppercase tracking-wider">Material Liberado!</span>
                <h3 class="text-lg sm:text-xl font-serif font-bold text-[#0E2340] mt-0.5">Seu cadastro foi realizado.</h3>
                <p class="text-xs text-[#657078] mt-1">
                  Faça o download do material exclusivo de apoio preparado para a palestra.
                </p>
              </div>

              <div class="p-3.5 bg-[#F8F7F4] rounded-xl border border-[#E9E2D3] text-left space-y-1.5">
                <div class="flex items-center gap-2 text-xs font-bold text-[#0E2340]">
                  <FileText class="w-4 h-4 text-[#B18A47]" />
                  <span>Material da Palestra (PDF)</span>
                </div>
                <p class="text-xs text-[#657078]">
                  "Angústia e Existência em Heidegger, Sartre e Camus — Guia de Leitura"
                </p>
              </div>

              <div class="space-y-3 pt-1">
                <a 
                  :href="downloadUrl" 
                  download 
                  class="btn-gold-cta w-full py-3.5 px-4 rounded-xl font-bold text-sm flex items-center justify-center gap-2 shadow-md"
                >
                  <Download class="w-4 h-4" />
                  BAIXAR MATERIAL EM PDF
                </a>

                <!-- Official Doity Registration Banner -->
                <div class="p-3 bg-[#091A2F]/5 rounded-xl border border-[#0E2340]/10 text-center space-y-2">
                  <p class="text-xs text-[#0E2340] font-medium">
                    Quer garantir seu certificado e presença na 2ª Semana de Psicologia?
                  </p>
                  <a 
                    :href="doityUrl" 
                    target="_blank"
                    rel="noopener noreferrer"
                    class="w-full py-2.5 px-3 rounded-lg bg-[#0E2340] hover:bg-[#091A2F] text-white font-semibold text-xs flex items-center justify-center gap-1.5 transition-colors"
                  >
                    <span>Fazer Inscrição Oficial no Doity</span>
                    <ExternalLink class="w-3.5 h-3.5 text-[#B18A47]" />
                  </a>
                </div>

                <button 
                  @click="isSubmitted = false" 
                  class="text-xs text-[#657078] hover:text-[#0E2340] underline block mx-auto pt-1"
                >
                  Fazer outro cadastro
                </button>
              </div>
            </div>

            <!-- FORM STATE -->
            <div v-else>
              <div class="mb-4">
                <div class="inline-flex items-center gap-1.5 text-xs font-bold text-[#B18A47] uppercase tracking-wider mb-1">
                  <BookOpen class="w-3.5 h-3.5" />
                  <span>Material Exclusivo</span>
                </div>
                <h2 class="text-xl sm:text-2xl font-serif font-bold text-[#0E2340]">
                  Receber Material da Palestra
                </h2>
                <p class="text-xs text-[#657078] mt-1">
                  Insira seus dados para baixar o PDF com o resumo temático e guia de leitura da palestra.
                </p>
              </div>

              <form @submit.prevent="submitForm" class="space-y-3">
                <!-- Nome -->
                <div>
                  <label class="block text-xs font-semibold text-[#0E2340] mb-1">
                    Nome Completo <span class="text-red-500">*</span>
                  </label>
                  <input 
                    v-model="form.nome"
                    type="text" 
                    required 
                    placeholder="Seu nome completo"
                    class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-[#E9E2D3] bg-[#F8F7F4]/50 focus:bg-white focus:border-[#B18A47] focus:ring-2 focus:ring-[#B18A47]/20 outline-none transition-all"
                  />
                  <span v-if="form.errors.nome" class="text-[11px] text-red-500 mt-1 block">
                    {{ form.errors.nome }}
                  </span>
                </div>

                <!-- E-mail -->
                <div>
                  <label class="block text-xs font-semibold text-[#0E2340] mb-1">
                    Seu Melhor E-mail <span class="text-red-500">*</span>
                  </label>
                  <input 
                    v-model="form.email"
                    type="email" 
                    required 
                    placeholder="seu.email@exemplo.com"
                    class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-[#E9E2D3] bg-[#F8F7F4]/50 focus:bg-white focus:border-[#B18A47] focus:ring-2 focus:ring-[#B18A47]/20 outline-none transition-all"
                  />
                  <span v-if="form.errors.email" class="text-[11px] text-red-500 mt-1 block">
                    {{ form.errors.email }}
                  </span>
                </div>

                <!-- WhatsApp -->
                <div>
                  <label class="block text-xs font-semibold text-[#0E2340] mb-1">
                    WhatsApp <span class="text-[#657078] font-normal">(opcional para avisos)</span>
                  </label>
                  <input 
                    :value="form.whatsapp"
                    @input="applyPhoneMask"
                    type="text" 
                    placeholder="(84) 99999-9999"
                    class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-[#E9E2D3] bg-[#F8F7F4]/50 focus:bg-white focus:border-[#B18A47] focus:ring-2 focus:ring-[#B18A47]/20 outline-none transition-all"
                  />
                </div>

                <!-- Submit CTA Button -->
                <button 
                  type="submit" 
                  :disabled="form.processing"
                  class="btn-gold-cta w-full py-3.5 px-4 rounded-xl font-bold text-sm tracking-wide flex items-center justify-center gap-2 cursor-pointer shadow-md disabled:opacity-50 mt-1"
                >
                  <span v-if="form.processing">LIBERANDO MATERIAL...</span>
                  <template v-else>
                    <Download class="w-4 h-4" />
                    <span>RECEBER MATERIAL EM PDF</span>
                  </template>
                </button>

                <!-- Security guarantee badge & Doity hint -->
                <div class="pt-1 space-y-2 text-center">
                  <div class="flex items-center justify-center gap-3 text-[11px] text-[#657078]">
                    <span class="flex items-center gap-1">
                      <ShieldCheck class="w-3.5 h-3.5 text-[#2E4A3D]" />
                      Dados Seguros
                    </span>
                    <span>•</span>
                    <span class="flex items-center gap-1">
                      <UserCheck class="w-3.5 h-3.5 text-[#B18A47]" />
                      Material Gratuito em PDF
                    </span>
                  </div>

                  <p class="text-[11px] text-[#657078]">
                    Para se inscrever oficialmente na Semana de Psicologia (UnP), 
                    <a :href="doityUrl" target="_blank" class="text-[#0E2340] font-semibold hover:underline inline-flex items-center gap-0.5">
                      clique aqui <ExternalLink class="w-3 h-3 text-[#B18A47]" />
                    </a>.
                  </p>
                </div>
              </form>
            </div>

          </div>
        </div>

      </div>
    </main>

    <!-- FOOTER / BOTTOM BAR -->
    <footer class="w-full border-t border-[#0E2340]/10 py-3 bg-[#F8F7F4] shrink-0">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-2 text-[11px] text-[#657078]">
        <div>
          © 2026 Odisseia Filosófica — Todos os direitos reservados.
        </div>
        <div class="flex items-center gap-4">
          <span>UnP Salgado Filho — Semana de Psicologia</span>
          <span>•</span>
          <a href="mailto:contato@odisseiafilosofica.com.br" class="hover:text-[#0E2340] transition-colors">
            contato@odisseiafilosofica.com.br
          </a>
        </div>
      </div>
    </footer>

    <!-- INTERACTIVE MODAL: EMENTA COMPLETA & BIOGRAFIA DO PALESTRANTE -->
    <div 
      v-if="showDetailsModal" 
      class="fixed inset-0 z-50 bg-[#091A2F]/80 backdrop-blur-xs flex items-center justify-center p-4 sm:p-6 overflow-y-auto"
      @click.self="showDetailsModal = false"
    >
      <div class="bg-white rounded-3xl max-w-3xl w-full p-6 sm:p-8 border border-[#E9E2D3] shadow-2xl relative space-y-6 my-auto max-h-[90vh] overflow-y-auto">
        
        <!-- Close Button -->
        <button 
          @click="showDetailsModal = false"
          class="absolute top-5 right-5 w-9 h-9 rounded-full bg-[#F8F7F4] hover:bg-[#E9E2D3] flex items-center justify-center text-[#0E2340] transition-colors"
        >
          <X class="w-5 h-5" />
        </button>

        <!-- Modal Header -->
        <div class="border-b border-[#E9E2D3] pb-4">
          <div class="inline-flex items-center gap-1.5 text-xs font-bold text-[#B18A47] uppercase tracking-wider mb-1">
            <BookOpen class="w-4 h-4" />
            <span>Detalhamento da Palestra</span>
          </div>
          <h2 class="text-xl sm:text-2xl font-serif font-bold text-[#0E2340]">
            Angústia e Existência: uma leitura fenomenológico-existencial em Heidegger, Sartre e Camus
          </h2>
        </div>

        <!-- Section 1: Objective & Ementa -->
        <div class="space-y-3">
          <h3 class="text-sm font-bold uppercase tracking-wider text-[#0E2340] flex items-center gap-2">
            <Sparkles class="w-4 h-4 text-[#B18A47]" />
            Objetivo e Proposta Temática
          </h3>
          <p class="text-xs sm:text-sm text-[#18232C]/85 leading-relaxed bg-[#F8F7F4] p-4 rounded-2xl border border-[#E9E2D3]">
            Compreender a angústia como uma dimensão fundamental da existência humana, a partir de uma abordagem fenomenológico-existencial baseada em Martin Heidegger, Jean-Paul Sartre e Albert Camus. A atividade busca diferenciar angústia de medo e ansiedade, analisando seu papel na revelação da liberdade, da responsabilidade e da condição humana. Propõe ainda uma articulação entre filosofia e psicologia, destacando a discussão deste tema no decorrer da história do pensamento ocidental, suas manifestações na vida contemporânea e suas implicações para o autoconhecimento.
          </p>
        </div>

        <!-- Section 2: Info Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 bg-[#091A2F] text-white p-4 rounded-2xl">
          <div>
            <span class="block text-[10px] text-[#E7D7B5] uppercase font-bold">Local / Evento</span>
            <span class="text-xs font-semibold">UnP Salgado Filho (Semana de Psicologia)</span>
          </div>
          <div>
            <span class="block text-[10px] text-[#E7D7B5] uppercase font-bold">Data & Horário</span>
            <span class="text-xs font-semibold">26/08 • 19h às 22h</span>
          </div>
          <div>
            <span class="block text-[10px] text-[#E7D7B5] uppercase font-bold">Capacidade</span>
            <span class="text-xs font-semibold">80 a 100 vagas</span>
          </div>
          <div>
            <span class="block text-[10px] text-[#E7D7B5] uppercase font-bold">Certificação</span>
            <span class="text-xs font-semibold">Inclusa</span>
          </div>
        </div>

        <!-- Section 3: Speaker Full Bio -->
        <div class="space-y-3 pt-2">
          <h3 class="text-sm font-bold uppercase tracking-wider text-[#0E2340] flex items-center gap-2">
            <Award class="w-4 h-4 text-[#B18A47]" />
            Sobre o Palestrante
          </h3>

          <div class="flex flex-col sm:flex-row gap-4 items-start bg-[#F8F7F4] p-4 rounded-2xl border border-[#E9E2D3]">
            <img 
              src="/images/jefferson.jpg" 
              alt="Jefferson Alves da Silva" 
              class="w-16 h-16 rounded-full object-cover border-2 border-[#B18A47] shrink-0"
              @error="(e) => e.target.src = '/images/author-avatar.jpeg'"
            />
            <div class="space-y-1.5 text-xs sm:text-sm text-[#18232C]/85">
              <h4 class="text-base font-bold text-[#0E2340]">Jefferson Alves da Silva</h4>
              <p class="text-xs font-semibold text-[#6A5542]">
                <strong class="text-[#0E2340]">Titulação:</strong> Graduado em Farmácia, Filosofia e Ciências da Religião; Pós-Graduado em Ciências da Religião e Filosofia da Religião. Graduando em Psicologia.
              </p>
              <p class="text-xs text-[#657078] leading-relaxed pt-1">
                Licenciado em Filosofia, com formação também em Farmácia e Ciências da Religião, além de pós-graduação nesta área e graduação em andamento em Psicologia. Possui trajetória transdisciplinar que articula os campos da saúde e das ciências humanas, com ênfase na compreensão da experiência humana a partir de perspectivas filosóficas. Atua no ensino e na produção de conteúdo em Filosofia e áreas afins, com ênfase na busca de clareza e sentido. Desenvolve trabalhos voltados à análise de temas como angústia, sentido e identidade, buscando integrar reflexão teórica e aplicação prática no campo do autoconhecimento.
              </p>
            </div>
          </div>
        </div>

        <!-- Close Action -->
        <div class="pt-2 flex justify-end">
          <button 
            @click="showDetailsModal = false"
            class="px-5 py-2.5 rounded-xl bg-[#0E2340] text-white text-xs font-bold hover:bg-[#091A2F] transition-colors"
          >
            Entendido / Fechar
          </button>
        </div>

      </div>
    </div>

  </div>
</template>
