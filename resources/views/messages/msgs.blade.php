{{----------------------------------------------------------------------------------------------
    MENSAGENS SOBRE O CLIENTE    
-----------------------------------------------------------------------------------------------}}
{{-- MENSAGEM DE CLIENTE ADICIONADO --}}
@if (session('cliente-store'))
<h5 class="alert text-warning text-center">{{ session('cliente-store') }}</h5>
@endif

{{-- MENSAGEM DE CLIENTE ATUALIZADO --}}
@if (session('cliente-atualizado'))
<h5 class="alert text-warning text-center">{{ session('cliente-atualizado') }}</h5>
@endif

{{-- MENSAGEM DE CLIENTE EXCLUÍDO --}}
@if (session('cliente-excluido'))
<h5 class="alert text-warning text-center">{{ session('cliente-excluido') }}</h5>
@endif


{{----------------------------------------------------------------------------------------------
    MENSAGENS SOBRE O SERVIÇO    
-----------------------------------------------------------------------------------------------}}
{{-- MENSAGEM DE SERVIÇO ADICIONADO --}}
@if (session('servico-store'))
<h5 class="alert text-warning text-center">{{ session('servico-store') }}</h5>
@endif

{{-- MENSAGEM DE SERVIÇO ATUALIZADO --}}
@if (session('servico-atualizado'))
<h5 class="alert text-warning text-center">{{ session('servico-atualizado') }}</h5>
@endif

{{-- MENSAGEM DE SERVIÇO EXCLUÍDO --}}
@if (session('servico-excluido'))
<h5 class="alert text-warning text-center">{{ session('servico-excluido') }}</h5>
@endif