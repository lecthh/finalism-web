<div id="add-program" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <form action="{{ url('programs') }}" method="post">
        @csrf
        <div class="w-[700] bg-white flex flex-col gap-y-6 p-6">
            <div class="flex">
                <h1 class="text-black font-bold text-2xl">Add Program</h1>
            </div>
            
            <div class="flex flex-col gap-y-3">
                <h1 class="font-medium ">Program Name</h1>
                <ul class="flex gap-x-3">
                    <li>
                        <input type="text" name="progfullname" class="border flex flex-grow border-[#9D59EF] focus:ring-[#9D59EF] px-4 py-3 text-[#CEACF7]" placeholder="Bachelor of ..." required>
                    </li>
                    <li>
                        <input type="text" name="progshortname" class="border flex flex-grow border-[#9D59EF] focus:ring-[#9D59EF] px-4 py-3 text-[#CEACF7]" placeholder="BS.." required>
                    </li>
                </ul>

                <div class="flex gap-x-3">
                    <div class="flex flex-col flex-grow gap-y-3">
                        <h1 class="font-medium">College</h1>

                        <select name="progcollid" id="progcollid" class="border border-[#9D59EF] focus:ring-[#9D59EF] px-4 py-3 text-[#CEACF7]">
                            @foreach($colleges as $item)
                                <option value="{{ $item->collid }}">
                                    {{ $item->collfullname }}
                                </option>
                            @endforeach
                        </select>
                        </div>
                    <style>
                        #collegeSelect {
                            width: 435px;
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                        }
                    </style>
                </div>

                <div class="flex flex-col flex-grow gap-y-3">
                        <h1 class="font-medium">Department</h1>
                        <select name="progcolldeptid" id="progcolldeptid" class="border border-[#9D59EF] focus:ring-[#9D59EF] px-4 py-3 text-[#CEACF7]">
                        </select>
                    </div>
                    <style>
                        #departmentSelect {
                            width: 435px;
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                        }
                    </style>
                </div>


                <div class="mt-[90px] flex gap-x-3 justify-end">
                    <button type="button" data-modal-target="add-program" data-modal-toggle="add-program" class="bg-[#CFCED0] gap-x-2 px-4 py-3 flex hover:bg-[#767676] transition ease-in-out delay-100">
                        <h1 class="text-white">Cancel</h1>
                    </button>

                    <button type="submit" data-modal-target="add-program" data-modal-toggle="add-program" class="bg-[#9D59EF] gap-x-2 pr-4 pl-5 py-3 flex hover:bg-[#673EEF] transition ease-in-out delay-100">
                        <h1 class="text-white">Add Program</h1>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 4L12 20" stroke="white" stroke-width="2"/>
                            <path d="M4 12L20 12" stroke="white" stroke-width="2"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>