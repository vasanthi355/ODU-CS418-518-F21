<style>

.footer {
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 1rem;
    background-color: #efefef;
    text-align: center;
    } 
</style>
<!-- Favicon -->
<link rel="shortcut icon" type="image/png" sizes="32x32" href="/image/favicon.png">
<link rel="icon" type="image/x-icon" href="/image/favicon.png">
<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Under Development ---
        </h2>
    </x-slot> --}}
    <div class="footer">This Is</div>
    <div class="flex" style="margin: 10px;height: 735px;border: 1px solid grey; overfolow-y:auto">
        <div class="flex-1 ..." style="border-right: 1px solid #38f7ae;margin-right: 5px; max-height: 734px; overflow-y:auto ">
           @if($id)
           @include('opages.fakenews'.$id)
           @endif
        </div>
        <div class="flex-1 ..." style="max-height: 734px; margin-left:2px; overflow-y:auto">
            <x-guest-layout>
                <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
                    <!-- Primary Navigation Menu -->
                    <div class="footer">This Is The Footer For The Webpage</div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-16">
                            <div class="flex">
                                {{-- Dashboard --}}
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="width:11em">
                                    <x-jet-nav-link href="{{ url('article/'.$id.'/dashboard') }}" active="{{ str_contains(url()->full(), '/dashboard') ? 'active': '' }}">
                                        Dashboard
                                    </x-jet-nav-link>
                                </div>
                                {{-- Snopes.com --}}
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="width:10.5em">
                                    <x-jet-nav-link href="{{ url('article/'.$id.'/snopes') }}" active="{{ str_contains(url()->full(), '/snopes') ? 'active': '' }}">
                                        Snopes
                                    </x-jet-nav-link>
                                </div>
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex {{ str_contains(url()->full(), '/survey') ? 'active': '' }}" style="width:10.5em">
                                    <x-jet-nav-link href="{{ url('article/'.$id.'/survey') }}" active="{{ str_contains(url()->full(), '/survey') ? 'active': '' }}">
                                        Survey
                                    </x-jet-nav-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <div>
                    @if(str_contains(url()->full(), '/dashboard'))
                        @include('dpages.relevantpages'.$id)
                    @elseif(str_contains(url()->full(), '/snopes'))
                        @include('spages.snopes'.$id)
                    @elseif(str_contains(url()->full(), '/survey'))
                        @include('survey_pages.survey')
                    @endif
                </div>
            </x-guest-layout>
        </div>
    </div>
</x-app-layout>