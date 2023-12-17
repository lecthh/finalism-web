<div id="add-student" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <form action="{{ url('students') }}" method="post">
        @csrf
        <div class="w-auto bg-white flex flex-col gap-y-6 p-6">    
            <div class="flex">
                <h1 class="text-black font-bold text-2xl">Add student</h1>
            </div>
            
            <div class="flex flex-col gap-y-3">
                <h1 class="font-medium">Full name</h1>
                <ul class="flex gap-x-3">
                    <li>
                        <input type="text" name="studfirstname" class="border border-[#9D59EF] focus:ring-[#9D59EF] px-4 py-3 text-[#CEACF7] " placeholder="Juan" required>
                    </li>
                    <li>
                        <input type="text" name="studmidname" class="border border-[#9D59EF] focus:ring-[#9D59EF] px-4 py-3 text-[#CEACF7]" placeholder="De La" required>
                    </li>
                    <li>
                        <input type="text" name="studlastname" class="border border-[#9D59EF] focus:ring-[#9D59EF] px-4 py-3 text-[#CEACF7]" placeholder="Cruz" required>
                    </li>
                </ul>

                <div class="flex gap-x-3">
                    <div class="flex flex-col flex-grow gap-y-3">
                        <h1 class="font-medium text-[#09050F]">College</h1>
                        <select name="studcollid" id="studcollid" class="bg-white whitespace-nowrap text-ellipsis border border-[#9D59EF] focus:ring-[#9D59EF] px-4 py-3 text-[#CEACF7] ">
                            @foreach($colleges as $item)
                                <option value="{{ $item->collid }}" data-programs="{{ json_encode($item->programs) }}" >
                                    {{ $item->collfullname }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col flex-grow gap-y-3">
                        <h1 class="font-medium text-[#09050F]">Program</h1>
                        <select name="studprogid" id="studprogid" class="bg-white whitespace-nowrap text-ellipsis border border-[#9D59EF] focus:ring-[#9D59EF] px-4 py-3 text-[#CEACF7]">
                        </select>
                    </div>
                </div>

                <div class="flex flex-col flex-grow gap-y-3">
                    <h1 class="font-medium">Year level</h1>
                    <select name="studyear" id="studyear" class="border border-[#9D59EF] focus:ring-[#9D59EF] px-4 py-3 text-[#CEACF7]">
                        <option value="1">1st Year</option>
                        <option value="2">2nd Year</option>
                        <option value="3">3rd Year</option>
                        <option value="4">4th Year</option>
                    </select>
                </div>


                <div class="mt-[90px] flex gap-x-3 justify-end">
                    <button type="button" data-modal-target="add-student" data-modal-toggle="add-student" class="bg-[#CFCED0] gap-x-2 px-4 py-3 flex hover:bg-[#767676] transition ease-in-out delay-100">
                        <h1 class="text-white">Cancel</h1>
                    </button>

                    <button type="submit" data-modal-target="add-student" data-modal-toggle="add-student" class="bg-[#9D59EF] gap-x-2 pr-4 pl-5 py-3 flex hover:bg-[#673EEF] transition ease-in-out delay-100">
                        <h1 class="text-white">Add Student</h1>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const collegeSelect = document.getElementById('studcollid');
        const programSelect = document.getElementById('studprogid');

        collegeSelect.addEventListener('change', function () {
            const selectedCollegeOption = collegeSelect.options[collegeSelect.selectedIndex];
            const programs = JSON.parse(selectedCollegeOption.getAttribute('data-programs'));

            programSelect.innerHTML = '';

            programs.forEach(program => {
                const option = document.createElement('option');
                option.value = program.progid;
                option.text = program.progfullname;
                programSelect.appendChild(option);
            });
        });
    });
</script>