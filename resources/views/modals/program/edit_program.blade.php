<div id="edit-program-{{ $programId }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <form action="{{ url('programs/' .$programId) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="w-[500px] bg-white flex flex-col gap-y-6 p-6">
            <div class="flex">
                <h1 class="text-black font-bold text-2xl">Edit Program</h1>
                <input type="hidden" name="progid" id="progidToEdit" value="{{ $programId }}">
            </div>
                <h1 class="font-medium">Program name</h1>
                <div class="flex gap-x-3">
                    <input type="text" name="progfullname" id="progfullname" value="{{ $programName }}" class="border flex-grow  border-[#9D59EF] focus:ring-[#9D59EF] px-4 py-3 text-[#CEACF7] " placeholder="Bachelor of ..." required>
                </div>

                <h1 class="font-medium">Program Abbreviation</h1>
                <div class="flex gap-x-3">
                    <input type="text" name="progshortname" id="progshortname" value="{{ $programAbbr }}" class="border flex-grow border-[#9D59EF] focus:ring-[#9D59EF] px-4 py-3 text-[#CEACF7] " placeholder="BS.." required>
                </div>                

                <div class="mt-[90px] flex gap-x-3 justify-end">
                    <button type="button" data-modal-target="edit-program-{{ $programId }}" data-modal-toggle="edit-program-{{ $programId }}" class="bg-[#CFCED0] gap-x-2 px-4 py-3 flex hover:bg-[#767676] transition ease-in-out delay-100">
                        <h1 class="text-white">Cancel</h1>
                    </button>

                    <button type="submit" value="Update" data-modal-target="edit-program-{{ $programId }}" data-modal-toggle="edit-program-{{ $programId }}" class="bg-[#9D59EF] gap-x-2 pr-4 pl-5 py-3 flex hover:bg-[#673EEF] transition ease-in-out delay-100">
                        <h1 class="text-white">Edit Program</h1>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
