<div id="add-college" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <form action="{{ url('colleges') }}" method="post">
        @csrf
        <div class="w-[700] bg-white flex flex-col gap-y-6 p-6">
            <div class="flex">
                <h1 class="text-black font-bold text-2xl">Add College</h1>
            </div>
            
            <div class="flex flex-col gap-y-3">
                <h1 class="font-medium">College Name</h1>
                <ul class="flex gap-x-3">
                    <li>
                        <input type="text" name="collfullname" id="collfullname" class="border flex flex-grow border-[#9D59EF] focus:ring-[#9D59EF] px-4 py-3 text-[#CEACF7]" placeholder="Bachelor of ...">
                    </li>
                    <li>
                        <input type="text" name="collshortname" id="collshortname" class="border flex flex-grow border-[#9D59EF] focus:ring-[#9D59EF] px-4 py-3 text-[#CEACF7]" placeholder="BS..">
                    </li>
                </ul>

                <div class="mt-[90px] flex gap-x-3 justify-end">
                    <button type="button" data-modal-target="add-college" data-modal-toggle="add-college" class="bg-[#CFCED0] gap-x-2 px-4 py-3 flex hover:bg-[#767676] transition ease-in-out delay-100">
                        <h1 class="text-white">Cancel</h1>
                    </button>
                        
                    <button type="submit" data-modal-target="add-college" data-modal-toggle="add-college" class="bg-[#9D59EF] gap-x-2 pr-4 pl-5 py-3 flex hover:bg-[#673EEF] transition ease-in-out delay-100">
                        <h1 class="text-white">Add College</h1>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
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