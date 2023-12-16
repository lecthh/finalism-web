<div id="delete-college" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <form action="{{ url('colleges/' .$item->collid) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="hidden" name="collid" id="collidToDelete" value="">
        <div class="w-[500px] bg-white flex flex-col gap-y-6 p-6 justify-center items-center">
            <h1 class="font-bold text-2xl">Delete college</h1>
            <input type="hidden" name="studid" id="studidToDelete" value="">
            <svg width="84" height="84" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_4_1543)">
                <path d="M42 7C61.3305 7 77 22.6695 77 42C77 61.3305 61.3305 77 42 77C22.6695 77 7 61.3305 7 42C7 22.6695 22.6695 7 42 7ZM42 52.5C41.0717 52.5 40.1815 52.8688 39.5251 53.5251C38.8687 54.1815 38.5 55.0717 38.5 56C38.5 56.9283 38.8687 57.8185 39.5251 58.4749C40.1815 59.1313 41.0717 59.5 42 59.5C42.9283 59.5 43.8185 59.1313 44.4749 58.4749C45.1312 57.8185 45.5 56.9283 45.5 56C45.5 55.0717 45.1312 54.1815 44.4749 53.5251C43.8185 52.8688 42.9283 52.5 42 52.5ZM42 21C41.1427 21.0001 40.3153 21.3148 39.6747 21.8845C39.0341 22.4542 38.6248 23.2391 38.5245 24.0905L38.5 24.5V45.5C38.501 46.3921 38.8426 47.2501 39.455 47.8988C40.0674 48.5475 40.9043 48.9378 41.7949 48.9901C42.6854 49.0424 43.5623 48.7526 44.2464 48.1801C44.9305 47.6075 45.3701 46.7953 45.4755 45.9095L45.5 45.5V24.5C45.5 23.5717 45.1312 22.6815 44.4749 22.0251C43.8185 21.3687 42.9283 21 42 21Z" fill="#FF0B47"/>
                </g>
                <defs>
                <clipPath id="clip0_4_1543">
                <rect width="84" height="84" fill="white"/>
                </clipPath>
                </defs>
            </svg>
            <p>Are you sure you want to delete college?</p>

            <div class="mt-[50px] flex gap-x-3">
            <button type="button" data-modal-target="delete-college" data-modal-toggle="delete-college" class="bg-[#FF0B47] gap-x-2 px-4 py-3 hover:bg-[#B90934] transition ease-in-out delay-100">
                <h1 class="text-white">Cancel</h1>
            </button>
            <button type="submit" data-modal-target="delete-college" data-modal-toggle="delete-college" class="bg-[#CFCED0] gap-x-2 px-4 py-3 hover:bg-[#767676] transition ease-in-out delay-100">
                <h1 class="text-white">Delete College</h1>
            </button>
        </div>
    </form>
</div>
