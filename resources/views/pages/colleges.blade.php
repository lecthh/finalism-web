@extends('layout.layout')
@section('content')
@include('modals.college.create_college')
    <div class="flex flex-col bg-[#1A0D2E] w-screen h-screen gap-y-5 p-5">
        <div class="flex justify-between w-full">
            <h1 class="font-bold text-white text-2xl">Colleges</h1>

            <div class="flex cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="M15 19.88c.04.3-.06.62-.29.83a.996.996 0 0 1-1.41 0L9.29 16.7a.989.989 0 0 1-.29-.83v-5.12L4.21 4.62a1 1 0 0 1 .17-1.4c.19-.14.4-.22.62-.22h14c.22 0 .43.08.62.22a1 1 0 0 1 .17 1.4L15 10.75zM7.04 5L11 10.06v5.52l2 2v-7.53L16.96 5z"/></svg>
                <h2 class="font-medium text-white">Filter</h2>
            </div>
        </div>

        <div class="flex flex-row gap-x-6 items-center">
            <button type="button" data-modal-target="add-college" data-modal-toggle="add-college" class="bg-[#9D59EF] gap-x-2 pr-4 pl-5 py-3 flex hover:bg-[#673EEF] transition ease-in-out delay-100">
                <h1 class="text-white">Add College</h1>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M12 4L12 20" stroke="white" stroke-width="2"/>
                    <path d="M4 12L20 12" stroke="white" stroke-width="2"/>
                </svg>
            </button>
        </div>

        <div class="relative overflow-x-auto table-container">
            <table class="w-full text-sm text-left rtl:text-right text-white">
                <thead class="text-xs text-white uppercase bg-[#9D59EF]">
                    <tr>
                        <th scope="col" class="px-5 py-3">
                            College ID
                        </th>
                        <th scope="col" class="px-5 py-3">
                            College
                        </th>
                        <th scope="col" class="px-5 py-3">
                            College Abbreviation
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($colleges as $item)
                         <!-- edit modal-->
                    @include('modals.college.edit_college', ['collegeId' => $item->collid, 'collegeName' => $item->collfullname, 'collegeAbbr' => $item->collshortname])   
                    @include('modals.college.delete_college', ['collegeId' => $item->collid, 'collegeName' => $item->collfullname, 'collegeAbbr' => $item->collshortname])   
                        <tr class="bg-white border-b hover:bg-purple-100 group/edit-delete">
                            <th scope="row" class="px-6 py-4 font-bold text-[#9D59EF] whitespace-nowrap">
                                {{ $item->collid }}
                            </th>
                            <td class="px-5 py-4 text-black">
                                {{ $item->collfullname }}
                            </td>
                            <td class="px-5 py-4 text-black">
                                {{ $item->collshortname }}
                            </td>
                            <td class="px-5 py-4 text-black">
                                <div class="group-hover/edit-delete:visible invisible flex gap-x-2">
                                    <button class="bg-[#9D59EF] px-5 py-1 text-white edit-college-btn" data-modal-target="edit-college-{{$item->collid}}" data-modal-toggle="edit-college-{{$item->collid}}">   
                                        Edit
                                    </button>
                                    <button type="submit" class="bg-[#FF0B47] px-5 py-1 text-white delete-college-btn" data-modal-target="delete-college-{{$item->collid}}" data-modal-toggle="delete-college-{{$item->collid}}" data-college-id="{{ $item->collid }}" >
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

@endsection