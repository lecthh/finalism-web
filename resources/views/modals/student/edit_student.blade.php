<div id="edit-student" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <form action="{{ url('students/' .$studentId) }}" method="POST">
        <div class="w-[500px] bg-white flex flex-col gap-y-6 p-6">
            <div class="flex">
                <h1 class="text-black font-bold text-2xl">Edit student</h1>
                <input type="hidden" name="studid" id="studidToEdit" value="">
            </div>

            <div class="flex gap-x-3">
                <div class="flex flex-col flex-grow gap-y-3">
                    <h1 class="font-medium">College</h1>
                    <select name="studcollid" id="studcollid" class="flex #673EEFborder border-[#9D59EF] focus:ring-[#9D59EF] px-4 py-3 text-[#CEACF7]">
                        @foreach($colleges as $item)
                            <option value="{{ $item->collid }}" >
                                {{ $item->collfullname }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="flex flex-col flex-grow gap-y-3">
                    <h1 class="font-medium">Program</h1>
                    <select name="studprogid" id="studprogid" class="flex border border-[#9D59EF] focus:ring-[#9D59EF] px-4 py-3 text-[#CEACF7]">
                        @foreach($programs as $item)
                            <option value="{{ $item->collid }}" >
                                {{ $item->progfullname }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex flex-col flex-grow gap-y-3">
                <h1 class="font-medium">Year level</h1>
                <select name="studyear" class="border border-[#9D59EF] focus:ring-[#9D59EF] px-4 py-3 text-[#CEACF7]">
                    <option value="1">1st Year</option>
                    <option value="2">2nd Year</option>
                    <option value="3">3rd Year</option>
                    <option value="4">4th Year</option>
                    </select>
            </div>

            <div class="mt-[90px] flex gap-x-3 justify-end">
                <button type="button" data-modal-target="edit-student" data-modal-toggle="edit-student" class="bg-[#CFCED0] gap-x-2 px-4 py-3 flex hover:bg-[#767676] transition ease-in-out delay-100">
                    <h1 class="text-white">Cancel</h1>
                </button>

                <button type="submit" data-modal-target="edit-student" data-modal-toggle="edit-student" class="bg-[#9D59EF] gap-x-2 pr-4 pl-5 py-3 flex hover:bg-[#673EEF] transition ease-in-out delay-100">
                    <h1 class="text-white">Edit Student</h1>
                </button>
            </div>
        </div>
    </form>
</div>