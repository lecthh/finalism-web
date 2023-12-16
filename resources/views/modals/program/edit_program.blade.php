<div id="edit-program" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <form action="{{ url('programs/' .$item->progid) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="w-[500px] bg-white flex flex-col gap-y-6 p-6">
            <div class="flex">
                <h1 class="text-black font-bold text-2xl">Edit Program</h1>
                <input type="hidden" name="progid" id="progidToEdit" value="">
            </div>

                <h1 class="font-medium">Program name</h1>
                <div class="flex gap-x-3">
                    <input type="text" name="progfullname" id="collfullname" class="border flex-grow border-[#9D59EF] focus:ring-[#9D59EF] px-4 py-3 text-[#CEACF7] " placeholder="Bachelor of ..." required>
                </div>

                <h1 class="font-medium">Program Abbreviation</h1>
                <div class="flex gap-x-3">
                    <input type="text" name="progshortname" id="collshortname" class="border flex-grow border-[#9D59EF] focus:ring-[#9D59EF] px-4 py-3 text-[#CEACF7] " placeholder="BS.." required>
                </div>

                <div class="flex gap-x-3">
                    <div class="flex flex-col flex-grow gap-y-3">
                        <h1 class="font-medium">College</h1>
                        <select name="progcollid" id="progcollid" class="border border-[#9D59EF] focus:ring-[#9D59EF] px-4 py-3 text-[#CEACF7]">
                        @foreach($programs as $item)
                            <option value="{{ $item->progid }}">
                                {{ $item->progcollid }}
                            </option>
                        @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex gap-x-3">
                    <div class="flex flex-col flex-grow gap-y-3">
                        <h1 class="font-medium">College</h1>
                        <select name="progcolldeptid" id="progcolldeptid" class="border border-[#9D59EF] focus:ring-[#9D59EF] px-4 py-3 text-[#CEACF7]">
                        @foreach($programs as $item)
                            <option value="{{ $item->progcolldeptid }}">
                                {{ $item->progcolldeptid }}
                            </option>
                        @endforeach
                        </select>
                    </div>
                </div>

                <div class="mt-[90px] flex gap-x-3 justify-end">
                    <button class="bg-[#9D59EF] px-5 py-1 text-white edit-program-btn" data-modal-target="edit-program" data-modal-toggle="edit-program"data-program-id="{{ $item->collid }}">
                        Edit
                    </button>

                    <button type="submit" data-modal-target="edit-program" data-modal-toggle="edit-program" class="bg-[#9D59EF] gap-x-2 pr-4 pl-5 py-3 flex hover:bg-[#673EEF] transition ease-in-out delay-100">
                        <h1 class="text-white">Edit Program</h1>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>