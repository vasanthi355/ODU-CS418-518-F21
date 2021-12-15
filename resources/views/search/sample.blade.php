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
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }} <span class="text-gray-400">({{ $count }})</span>
        </h2>
    </x-slot>
    <div class="footer">This Is The Footer For The Webpage.</div>
    <div class="mt-8 mt-8">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="height: 620px;overflow-y: auto;">
                @forelse ($response as $article)
                    <div class="bg-white border-b border-gray-200 space-y-8">
                        @if ($esearch != '')
                            <article class="space-y-1" style="padding:20px !important;  border-bottom: 1px solid #a7d5f3;">
                                <h2 class="font-semibold text-2xl" style="text-decoration: underline"><a href="{{ url('article/'.$article['_id']) }}"><div class="highlight"><p>{{ $article['highlight']['title'][0]  }}</p></div></a></h2>
                                <div class="high_desc"><p class="m-0">{{ $article['highlight']['title'][0]  }}</p></div>
                                </body>
                                <div>
                                    <span class="text-xs px-2 py-1 rounded bg-indigo-50 text-indigo-500" style="font-size: 13px;font-weight: 600;">Author: {{$article['_source']['author']}}</span>
                                </div>
                            </article>  
                        @else
                            <article class="space-y-1" style="padding:20px !important;  border-bottom: 1px solid #a7d5f3;">
                                <h2 class="font-semibold text-2xl" style="text-decoration: underline"><a href="{{ url('article/'.$article['_id']) }}">{{ $article['_source']['title']  }}</a></h2>
                                <p class="m-0">{{ $article['_source']['description']  }}</body>
                                <div>
                                    <span class="text-xs px-2 py-1 rounded bg-indigo-50 text-indigo-500" style="font-size: 13px;font-weight: 600;">Author: {{$article['_source']['author']}}</span>
                                </div>
                            </article> 
                        @endif
                        
                        @empty
                            <p style="margin: 21%;margin-left: 44%;">No articles found</p>
                        @endforelse  
                    </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
        


<script>
    var high = document.getElementsByClassName("highlight")
    // console.log(high[0].innerHTML)
    for (let index = 0; index < high.length; ++index) {
        // const element = high[index];
        var highlightText = high[index].innerHTML;
        // console.log("Highlight Text :- ", highlightText);
        var doc = new DOMParser().parseFromString(highlightText, "text/xml");
        high[index].innerHTML = doc.firstChild.firstChild.data;
        // console.log("document ",doc);
    }
    var high_des = document.getElementsByClassName("high_desc")
    // console.log(high_des.length)
    for (let index1 = 0; index1 < high_des.length; ++index1) {
        // const element1 = high_des[index1];
        var highlightDesc = high_des[index1].innerHTML;
        // console.log(highlightDesc.trim());
        var doc1 = new DOMParser().parseFromString(highlightDesc, "text/xml");
        high_des[index1].innerHTML = doc1.firstChild.firstChild.data;
        // console.log(doc1.firstChild);
    }
</script>