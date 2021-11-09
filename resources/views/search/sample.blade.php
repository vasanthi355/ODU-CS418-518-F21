<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }} <span class="text-gray-400">({{ $count }})</span>
        </h2>
    </x-slot>

    <div class="mt-8 mt-8">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="height: 620px;overflow-y: auto;">
                @forelse ($response as $article)
                    <div class="bg-white border-b border-gray-200 space-y-8">
                        <article class="space-y-1" style="padding:20px !important;  border-bottom: 1px solid #f3a7ba;">
                            <h2 class="font-semibold text-2xl" style="text-decoration: underline"><a href="{{ url('article/'.$article['_id']) }}">{{ $article['_source']['title']  }}</a></h2>
                            <p class="m-0">{{ $article['_source']['description']  }}</body>
                            <div>
                                <span class="text-xs px-2 py-1 rounded bg-indigo-50 text-indigo-500" style="font-size: 13px;font-weight: 600;">Author: {{$article['_source']['author']}}</span>
                            </div>
                        </article>
                        @empty
                            <p style="margin: 21%;margin-left: 44%;">No articles found</p>
                        @endforelse  
                    </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
