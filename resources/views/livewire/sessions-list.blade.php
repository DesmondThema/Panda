<div>
    <div class="mb-4 flex">
        <div class="mr-2 w-1/3">
            <select wire:model="selectedKeyword" id="selectedKeyword" name="selectedKeyword" class="mt-1 block py-2 w-full px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">All Highlights</option> @foreach($keywords as $keyword) <option wire:key="{{ $keyword['id'] }}" value="{{ $keyword['id'] }}">{{ $keyword['name'] }}</option> @endforeach
            </select>
        </div>
        <div class="w-1/3">
            <select wire:model="selectedDate" id="selectedDate" name="selectedDate" class="mt-1 block py-2 w-full px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">All Days</option> @foreach($availableDays as $day) <option wire:key="{{ $day }}" value="{{ $day }}">{{ $day }}</option> @endforeach
            </select>
        </div>
    </div>
    <div class="mt-4"> @if (empty($sessions)) <p class="text-gray-500">No sessions match the selected filters. You can either clear the filters or try different ones.</p>
        <button wire:click="clearFilters" class=" text-blue-500 underline">Clear All Filters</button>
        <iframe src="https://giphy.com/embed/5rQJdo97swSTBQwhRA" width="240" height="240" frameBorder="0"></iframe> @else <ul role="list" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4"> @foreach($sessions as $session) <li class="bg-white px-4 py-6 shadow sm:rounded-lg sm:p-6">
                <article aria-labelledby="question-title-{{ $session['id'] }}">
                    <div>
                        <div class="flex space-x-3">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full" src="{{ $session['user']['picture'] }}" alt="">
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-sm font-medium text-gray-900">
                                    <a href="#" class="hover:underline">
                                        {{ !empty($session['user']['name']) ? $session['user']['name'] : $session['user']['nickname'] }}
                                    </a>
                                </p>
                                <p class="text-sm text-gray-500">
                                    <a href="#" class="hover:underline">
                                        <time datetime="2020-12-09T11:43:00">{{ \Carbon\Carbon::parse($session['date'])->format('F j \a\t g:i A') }}</time>
                                    </a>
                                </p>
                            </div>
                            <div class="flex flex-shrink-0 self-center">
                                <div class="relative inline-block text-left"></div>
                            </div>
                        </div>
                        <h2 class="mt-4 text-base font-medium text-gray-900">{{ $session['topic'] }}</h2>
                    </div>
                    <div class="mt-2 space-y-4 text-sm text-gray-700">
                        <p>{!! Illuminate\Support\Str::limit($session['description'], 250) !!}</p>
                    </div>
                    <div class="mt-6 flex justify-between space-x-8">
                        <div class="flex space-x-6"></div>
                        <div class="flex text-sm flex-wrap"> @foreach($session['keywords'] as $keyword) <div class="mb-2 mr-2">
                <span class="inline-flex items-center gap-x-1.5 rounded-full bg-blue-100 px-2 py-1 text-xs font-medium text-blue-700">
                  <svg class="h-1.5 w-1.5 fill-blue-500" viewBox="0 0 6 6" aria-hidden="true">
                    <circle cx="3" cy="3" r="3" />
                  </svg>
                  {{$keyword['name']}}
                </span>
                            </div> @endforeach </div>
                    </div>
                </article>
            </li> @endforeach </ul> @endif
    </div>
</div>
