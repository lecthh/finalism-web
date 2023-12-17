<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include '/Applications/XAMPP/xamppfiles/htdocs/website/usjr/db_conf.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <style>
        .table-container {
            max-height: 700px;
            overflow-y: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            position: sticky;
            top: 0;
            background-color: #9D59EF;
            z-index: 1; 
        }

        table th, table td {
            padding: 8px 10px;
            text-align: left;
        }
    </style>
</head>
<body class="flex">
    <aside class="w-80 gap-y-6 flex flex-col h-screen justify-between">
        <div class="flex-col">
            <div class="p-6">
                <svg width="144" height="24" viewBox="0 0 144 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.9858 8.56534C10.9176 7.87784 10.625 7.34375 10.108 6.96307C9.59091 6.58239 8.8892 6.39204 8.00284 6.39204C7.40057 6.39204 6.89205 6.47727 6.47727 6.64773C6.0625 6.8125 5.74432 7.04261 5.52273 7.33807C5.30682 7.63352 5.19886 7.96875 5.19886 8.34375C5.1875 8.65625 5.25284 8.92898 5.39489 9.16193C5.54261 9.39489 5.74432 9.59659 6 9.76705C6.25568 9.93182 6.55114 10.0767 6.88636 10.2017C7.22159 10.321 7.57955 10.4233 7.96023 10.5085L9.52841 10.8835C10.2898 11.054 10.9886 11.2812 11.625 11.5653C12.2614 11.8494 12.8125 12.1989 13.2784 12.6136C13.7443 13.0284 14.1051 13.517 14.3608 14.0795C14.6222 14.642 14.7557 15.2869 14.7614 16.0142C14.7557 17.0824 14.483 18.0085 13.9432 18.7926C13.4091 19.571 12.6364 20.1761 11.625 20.608C10.6193 21.0341 9.40625 21.2472 7.9858 21.2472C6.5767 21.2472 5.34943 21.0312 4.30398 20.5994C3.2642 20.1676 2.4517 19.5284 1.86648 18.6818C1.28693 17.8295 0.982955 16.7756 0.954545 15.5199H4.52557C4.56534 16.1051 4.73295 16.5937 5.02841 16.9858C5.32955 17.3722 5.73011 17.6648 6.23011 17.8636C6.7358 18.0568 7.30682 18.1534 7.94318 18.1534C8.56818 18.1534 9.1108 18.0625 9.57102 17.8807C10.0369 17.6989 10.3977 17.446 10.6534 17.1222C10.9091 16.7983 11.0369 16.4261 11.0369 16.0057C11.0369 15.6136 10.9205 15.2841 10.6875 15.017C10.4602 14.75 10.125 14.5227 9.68182 14.3352C9.24432 14.1477 8.70739 13.9773 8.07102 13.8239L6.17045 13.3466C4.69886 12.9886 3.53693 12.429 2.68466 11.6676C1.83239 10.9062 1.40909 9.88068 1.41477 8.59091C1.40909 7.53409 1.69034 6.6108 2.25852 5.82102C2.83239 5.03125 3.61932 4.41477 4.61932 3.97159C5.61932 3.52841 6.75568 3.30682 8.02841 3.30682C9.32386 3.30682 10.4545 3.52841 11.4205 3.97159C12.392 4.41477 13.1477 5.03125 13.6875 5.82102C14.2273 6.6108 14.5057 7.52557 14.5227 8.56534H10.9858ZM23.0902 21.2557C21.7493 21.2557 20.5959 20.9716 19.63 20.4034C18.6697 19.8295 17.9311 19.0341 17.4141 18.017C16.9027 17 16.647 15.8295 16.647 14.5057C16.647 13.1648 16.9055 11.9886 17.4226 10.9773C17.9453 9.96023 18.6868 9.16761 19.647 8.59943C20.6072 8.02557 21.7493 7.73864 23.0732 7.73864C24.2152 7.73864 25.2152 7.94602 26.0732 8.36079C26.9311 8.77557 27.6101 9.35795 28.1101 10.108C28.6101 10.858 28.8857 11.7386 28.9368 12.75H25.5107C25.4141 12.0966 25.1584 11.571 24.7436 11.1733C24.3345 10.7699 23.7976 10.5682 23.1328 10.5682C22.5703 10.5682 22.0788 10.7216 21.6584 11.0284C21.2436 11.3295 20.9197 11.7699 20.6868 12.3494C20.4538 12.929 20.3374 13.6307 20.3374 14.4545C20.3374 15.2898 20.451 16 20.6783 16.5852C20.9112 17.1705 21.2379 17.6165 21.6584 17.9233C22.0788 18.2301 22.5703 18.3835 23.1328 18.3835C23.5476 18.3835 23.9197 18.2983 24.2493 18.1278C24.5845 17.9574 24.8601 17.7102 25.076 17.3864C25.2976 17.0568 25.4425 16.6619 25.5107 16.2017H28.9368C28.88 17.2017 28.6072 18.0824 28.1186 18.8438C27.6357 19.5994 26.968 20.1903 26.1158 20.6165C25.2635 21.0426 24.255 21.2557 23.0902 21.2557ZM34.892 13.4318V21H31.2614V3.54545H34.7898V10.2188H34.9432C35.2386 9.44602 35.7159 8.84091 36.375 8.40341C37.0341 7.96023 37.8608 7.73864 38.8551 7.73864C39.7642 7.73864 40.5568 7.9375 41.233 8.33523C41.9148 8.72727 42.4432 9.29261 42.8182 10.0312C43.1989 10.7642 43.3864 11.642 43.3807 12.6648V21H39.75V13.3125C39.7557 12.5057 39.5511 11.8778 39.1364 11.429C38.7273 10.9801 38.1534 10.7557 37.4148 10.7557C36.9205 10.7557 36.483 10.8608 36.1023 11.071C35.7273 11.2812 35.4318 11.5881 35.2159 11.9915C35.0057 12.3892 34.8977 12.8693 34.892 13.4318ZM52.1527 21.2557C50.8288 21.2557 49.6839 20.9744 48.718 20.4119C47.7578 19.8437 47.0163 19.054 46.4936 18.0426C45.9709 17.0256 45.7095 15.8466 45.7095 14.5057C45.7095 13.1534 45.9709 11.9716 46.4936 10.9602C47.0163 9.94318 47.7578 9.15341 48.718 8.59091C49.6839 8.02273 50.8288 7.73864 52.1527 7.73864C53.4766 7.73864 54.6186 8.02273 55.5788 8.59091C56.5447 9.15341 57.2891 9.94318 57.8118 10.9602C58.3345 11.9716 58.5959 13.1534 58.5959 14.5057C58.5959 15.8466 58.3345 17.0256 57.8118 18.0426C57.2891 19.054 56.5447 19.8437 55.5788 20.4119C54.6186 20.9744 53.4766 21.2557 52.1527 21.2557ZM52.1697 18.4432C52.772 18.4432 53.2749 18.2727 53.6783 17.9318C54.0817 17.5852 54.3857 17.1136 54.5902 16.517C54.8004 15.9205 54.9055 15.2415 54.9055 14.4801C54.9055 13.7188 54.8004 13.0398 54.5902 12.4432C54.3857 11.8466 54.0817 11.375 53.6783 11.0284C53.2749 10.6818 52.772 10.5085 52.1697 10.5085C51.5618 10.5085 51.0504 10.6818 50.6357 11.0284C50.2266 11.375 49.9169 11.8466 49.7067 12.4432C49.5021 13.0398 49.3999 13.7188 49.3999 14.4801C49.3999 15.2415 49.5021 15.9205 49.7067 16.517C49.9169 17.1136 50.2266 17.5852 50.6357 17.9318C51.0504 18.2727 51.5618 18.4432 52.1697 18.4432ZM66.8714 21.2557C65.5476 21.2557 64.4027 20.9744 63.4368 20.4119C62.4766 19.8437 61.7351 19.054 61.2124 18.0426C60.6896 17.0256 60.4283 15.8466 60.4283 14.5057C60.4283 13.1534 60.6896 11.9716 61.2124 10.9602C61.7351 9.94318 62.4766 9.15341 63.4368 8.59091C64.4027 8.02273 65.5476 7.73864 66.8714 7.73864C68.1953 7.73864 69.3374 8.02273 70.2976 8.59091C71.2635 9.15341 72.0078 9.94318 72.5305 10.9602C73.0533 11.9716 73.3146 13.1534 73.3146 14.5057C73.3146 15.8466 73.0533 17.0256 72.5305 18.0426C72.0078 19.054 71.2635 19.8437 70.2976 20.4119C69.3374 20.9744 68.1953 21.2557 66.8714 21.2557ZM66.8885 18.4432C67.4908 18.4432 67.9936 18.2727 68.397 17.9318C68.8004 17.5852 69.1044 17.1136 69.3089 16.517C69.5192 15.9205 69.6243 15.2415 69.6243 14.4801C69.6243 13.7188 69.5192 13.0398 69.3089 12.4432C69.1044 11.8466 68.8004 11.375 68.397 11.0284C67.9936 10.6818 67.4908 10.5085 66.8885 10.5085C66.2805 10.5085 65.7692 10.6818 65.3544 11.0284C64.9453 11.375 64.6357 11.8466 64.4254 12.4432C64.2209 13.0398 64.1186 13.7188 64.1186 14.4801C64.1186 15.2415 64.2209 15.9205 64.4254 16.517C64.6357 17.1136 64.9453 17.5852 65.3544 17.9318C65.7692 18.2727 66.2805 18.4432 66.8885 18.4432ZM79.3061 3.54545V21H75.6754V3.54545H79.3061ZM82.2145 21V7.90909H85.8452V21H82.2145ZM84.0384 6.22159C83.4986 6.22159 83.0355 6.04261 82.6491 5.68466C82.2685 5.32102 82.0781 4.88636 82.0781 4.38068C82.0781 3.88068 82.2685 3.4517 82.6491 3.09375C83.0355 2.73011 83.4986 2.54829 84.0384 2.54829C84.5781 2.54829 85.0384 2.73011 85.419 3.09375C85.8054 3.4517 85.9986 3.88068 85.9986 4.38068C85.9986 4.88636 85.8054 5.32102 85.419 5.68466C85.0384 6.04261 84.5781 6.22159 84.0384 6.22159ZM94.7195 21.2557C93.3729 21.2557 92.2138 20.983 91.2422 20.4375C90.2763 19.8864 89.532 19.108 89.0092 18.1023C88.4865 17.0909 88.2251 15.8949 88.2251 14.5142C88.2251 13.1676 88.4865 11.9858 89.0092 10.9688C89.532 9.9517 90.2678 9.15909 91.2166 8.59091C92.1712 8.02273 93.2905 7.73864 94.5746 7.73864C95.4382 7.73864 96.2422 7.87784 96.9865 8.15625C97.7365 8.42898 98.3899 8.84091 98.9467 9.39205C99.5092 9.94318 99.9467 10.6364 100.259 11.4716C100.572 12.3011 100.728 13.2727 100.728 14.3864V15.3835H89.674V13.1335H97.3104C97.3104 12.6108 97.1967 12.1477 96.9695 11.7443C96.7422 11.3409 96.4268 11.0256 96.0234 10.7983C95.6257 10.5653 95.1626 10.4489 94.6342 10.4489C94.0831 10.4489 93.5945 10.5767 93.1683 10.8324C92.7479 11.0824 92.4183 11.4205 92.1797 11.8466C91.9411 12.267 91.8189 12.7358 91.8132 13.2528V15.392C91.8132 16.0398 91.9325 16.5994 92.1712 17.071C92.4155 17.5426 92.7592 17.9062 93.2024 18.1619C93.6456 18.4176 94.1712 18.5455 94.7791 18.5455C95.1825 18.5455 95.5518 18.4886 95.8871 18.375C96.2223 18.2614 96.5092 18.0909 96.7479 17.8636C96.9865 17.6364 97.1683 17.358 97.2933 17.0284L100.651 17.25C100.481 18.0568 100.131 18.7614 99.603 19.3636C99.0803 19.9602 98.4041 20.4261 97.5746 20.7614C96.7507 21.0909 95.799 21.2557 94.7195 21.2557ZM109.063 21.2557C107.717 21.2557 106.558 20.983 105.586 20.4375C104.62 19.8864 103.876 19.108 103.353 18.1023C102.83 17.0909 102.569 15.8949 102.569 14.5142C102.569 13.1676 102.83 11.9858 103.353 10.9688C103.876 9.9517 104.612 9.15909 105.56 8.59091C106.515 8.02273 107.634 7.73864 108.918 7.73864C109.782 7.73864 110.586 7.87784 111.33 8.15625C112.08 8.42898 112.734 8.84091 113.29 9.39205C113.853 9.94318 114.29 10.6364 114.603 11.4716C114.915 12.3011 115.072 13.2727 115.072 14.3864V15.3835H104.018V13.1335H111.654C111.654 12.6108 111.54 12.1477 111.313 11.7443C111.086 11.3409 110.771 11.0256 110.367 10.7983C109.969 10.5653 109.506 10.4489 108.978 10.4489C108.427 10.4489 107.938 10.5767 107.512 10.8324C107.092 11.0824 106.762 11.4205 106.523 11.8466C106.285 12.267 106.163 12.7358 106.157 13.2528V15.392C106.157 16.0398 106.276 16.5994 106.515 17.071C106.759 17.5426 107.103 17.9062 107.546 18.1619C107.989 18.4176 108.515 18.5455 109.123 18.5455C109.526 18.5455 109.896 18.4886 110.231 18.375C110.566 18.2614 110.853 18.0909 111.092 17.8636C111.33 17.6364 111.512 17.358 111.637 17.0284L114.995 17.25C114.825 18.0568 114.475 18.7614 113.947 19.3636C113.424 19.9602 112.748 20.4261 111.918 20.7614C111.094 21.0909 110.143 21.2557 109.063 21.2557Z" fill="#673EEF"/>
                    <path d="M139.352 7.61699L135.392 4.05399C134.265 3.03899 133.702 2.53099 133.009 2.26599L133 4.99999C133 7.35699 133 8.53599 133.732 9.26799C134.464 9.99999 135.643 9.99999 138 9.99999H141.58C141.218 9.29599 140.568 8.71199 139.352 7.61699Z" fill="#673EEF"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M134 22H130C126.229 22 124.343 22 123.172 20.828C122 19.657 122 17.771 122 14V10C122 6.229 122 4.343 123.172 3.172C124.343 2 126.239 2 130.03 2C130.636 2 131.121 2 131.53 2.017C131.517 2.097 131.51 2.178 131.51 2.261L131.5 5.095C131.5 6.192 131.5 7.162 131.605 7.943C131.719 8.79 131.98 9.637 132.672 10.329C133.362 11.019 134.21 11.281 135.057 11.395C135.838 11.5 136.808 11.5 137.905 11.5H141.957C142 12.034 142 12.69 142 13.563V14C142 17.771 142 19.657 140.828 20.828C139.657 22 137.771 22 134 22ZM137 16C137.552 16 138 15.328 138 14.5C138 13.672 137.552 13 137 13C136.448 13 136 13.672 136 14.5C136 15.328 136.448 16 137 16ZM128.376 17.084C128.486 16.9185 128.658 16.8036 128.853 16.7646C129.048 16.7256 129.251 16.7657 129.416 16.876C130.181 17.3862 131.08 17.6584 132 17.6584C132.92 17.6584 133.819 17.3862 134.584 16.876C134.75 16.7683 134.951 16.7302 135.144 16.77C135.338 16.8098 135.508 16.9242 135.617 17.0885C135.727 17.2529 135.767 17.4538 135.729 17.6476C135.692 17.8415 135.579 18.0127 135.416 18.124C134.404 18.7984 133.216 19.1583 132 19.1583C130.784 19.1583 129.596 18.7984 128.584 18.124C128.419 18.0137 128.304 17.8421 128.265 17.6471C128.226 17.452 128.266 17.2495 128.376 17.084ZM127 16C127.552 16 128 15.328 128 14.5C128 13.672 127.552 13 127 13C126.448 13 126 13.672 126 14.5C126 15.328 126.448 16 127 16Z" fill="#673EEF"/>
                </svg>
            </div>

            <ul class="g-y-3 py-3">
                <li class="px-4 cursor-pointer">
                    <a href="dashboard-students.php">
                        <div class="flex p-3 rounded-md gap-x-3 hover:bg-[#F1F5F9]">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.25933 10.1466C3.98688 12.2307 3.82139 14.3483 3.76853 16.494C6.66451 17.703 9.41893 19.1835 12 20.9036C14.5811 19.1835 17.3355 17.703 20.2315 16.494C20.1786 14.3484 20.0131 12.2307 19.7407 10.1467M4.25933 10.1466C3.38362 9.8523 2.49729 9.58107 1.60107 9.3337C4.84646 7.05887 8.32741 5.0972 12 3.49255C15.6727 5.0972 19.1536 7.05888 22.399 9.33371C21.5028 9.58109 20.6164 9.85233 19.7407 10.1467M4.25933 10.1466C6.94656 11.0499 9.5338 12.1709 12.0001 13.4886C14.4663 12.1709 17.0535 11.0499 19.7407 10.1467M6.75 15C7.16421 15 7.5 14.6642 7.5 14.25C7.5 13.8358 7.16421 13.5 6.75 13.5C6.33579 13.5 6 13.8358 6 14.25C6 14.6642 6.33579 15 6.75 15ZM6.75 15V11.3245C8.44147 10.2735 10.1936 9.31094 12 8.44329M4.99264 19.9926C6.16421 18.8211 6.75 17.2855 6.75 15.75V14.25" stroke="#201433" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <h1>Student</h1>
                        </div>
                    </a>
                </li>

                <li class="px-4 cursor-pointer">
                    <a href="dashboard-programs.php">
                        <div class="flex p-3 rounded-md gap-x-3 hover:bg-[#F1F5F9] transition ease-in-out delay-100">
                            <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.5 13.25V10.625C16.5 8.76104 14.989 7.25 13.125 7.25H11.625C11.0037 7.25 10.5 6.74632 10.5 6.125V4.625C10.5 2.76104 8.98896 1.25 7.125 1.25H5.25M5.25 14H12.75M5.25 17H9M7.5 1.25H2.625C2.00368 1.25 1.5 1.75368 1.5 2.375V19.625C1.5 20.2463 2.00368 20.75 2.625 20.75H15.375C15.9963 20.75 16.5 20.2463 16.5 19.625V10.25C16.5 5.27944 12.4706 1.25 7.5 1.25Z" stroke="#64748B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.5 13.25V10.625C16.5 8.76104 14.989 7.25 13.125 7.25H11.625C11.0037 7.25 10.5 6.74632 10.5 6.125V4.625C10.5 2.76104 8.98896 1.25 7.125 1.25H5.25M5.25 14H12.75M5.25 17H9M7.5 1.25H2.625C2.00368 1.25 1.5 1.75368 1.5 2.375V19.625C1.5 20.2463 2.00368 20.75 2.625 20.75H15.375C15.9963 20.75 16.5 20.2463 16.5 19.625V10.25C16.5 5.27944 12.4706 1.25 7.5 1.25Z" stroke="black" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.5 13.25V10.625C16.5 8.76104 14.989 7.25 13.125 7.25H11.625C11.0037 7.25 10.5 6.74632 10.5 6.125V4.625C10.5 2.76104 8.98896 1.25 7.125 1.25H5.25M5.25 14H12.75M5.25 17H9M7.5 1.25H2.625C2.00368 1.25 1.5 1.75368 1.5 2.375V19.625C1.5 20.2463 2.00368 20.75 2.625 20.75H15.375C15.9963 20.75 16.5 20.2463 16.5 19.625V10.25C16.5 5.27944 12.4706 1.25 7.5 1.25Z" stroke="black" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.5 13.25V10.625C16.5 8.76104 14.989 7.25 13.125 7.25H11.625C11.0037 7.25 10.5 6.74632 10.5 6.125V4.625C10.5 2.76104 8.98896 1.25 7.125 1.25H5.25M5.25 14H12.75M5.25 17H9M7.5 1.25H2.625C2.00368 1.25 1.5 1.75368 1.5 2.375V19.625C1.5 20.2463 2.00368 20.75 2.625 20.75H15.375C15.9963 20.75 16.5 20.2463 16.5 19.625V10.25C16.5 5.27944 12.4706 1.25 7.5 1.25Z" stroke="black" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.5 13.25V10.625C16.5 8.76104 14.989 7.25 13.125 7.25H11.625C11.0037 7.25 10.5 6.74632 10.5 6.125V4.625C10.5 2.76104 8.98896 1.25 7.125 1.25H5.25M5.25 14H12.75M5.25 17H9M7.5 1.25H2.625C2.00368 1.25 1.5 1.75368 1.5 2.375V19.625C1.5 20.2463 2.00368 20.75 2.625 20.75H15.375C15.9963 20.75 16.5 20.2463 16.5 19.625V10.25C16.5 5.27944 12.4706 1.25 7.5 1.25Z" stroke="black" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.5 13.25V10.625C16.5 8.76104 14.989 7.25 13.125 7.25H11.625C11.0037 7.25 10.5 6.74632 10.5 6.125V4.625C10.5 2.76104 8.98896 1.25 7.125 1.25H5.25M5.25 14H12.75M5.25 17H9M7.5 1.25H2.625C2.00368 1.25 1.5 1.75368 1.5 2.375V19.625C1.5 20.2463 2.00368 20.75 2.625 20.75H15.375C15.9963 20.75 16.5 20.2463 16.5 19.625V10.25C16.5 5.27944 12.4706 1.25 7.5 1.25Z" stroke="black" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.5 13.25V10.625C16.5 8.76104 14.989 7.25 13.125 7.25H11.625C11.0037 7.25 10.5 6.74632 10.5 6.125V4.625C10.5 2.76104 8.98896 1.25 7.125 1.25H5.25M5.25 14H12.75M5.25 17H9M7.5 1.25H2.625C2.00368 1.25 1.5 1.75368 1.5 2.375V19.625C1.5 20.2463 2.00368 20.75 2.625 20.75H15.375C15.9963 20.75 16.5 20.2463 16.5 19.625V10.25C16.5 5.27944 12.4706 1.25 7.5 1.25Z" stroke="black" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <h1>Program</h1>
                        </div>
                    </a>
                    
                </li>

                <li class="px-4 cursor-pointer">
                    <a href="dashboard-departments.php">
                        <div class="flex p-3 rounded-md gap-x-3 bg-[#F1F5F9] transition ease-in-out delay-100">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 19V10.75M13.75 19V10.75M6.25 19V10.75M1 7L10 1L19 7M17.5 19V8.3325C15.0563 7.94906 12.5514 7.75 10 7.75C7.44861 7.75 4.94372 7.94906 2.5 8.3325V19M1 19H19M10 4.75H10.0075V4.7575H10V4.75Z" stroke="#64748B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 19V10.75M13.75 19V10.75M6.25 19V10.75M1 7L10 1L19 7M17.5 19V8.3325C15.0563 7.94906 12.5514 7.75 10 7.75C7.44861 7.75 4.94372 7.94906 2.5 8.3325V19M1 19H19M10 4.75H10.0075V4.7575H10V4.75Z" stroke="black" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 19V10.75M13.75 19V10.75M6.25 19V10.75M1 7L10 1L19 7M17.5 19V8.3325C15.0563 7.94906 12.5514 7.75 10 7.75C7.44861 7.75 4.94372 7.94906 2.5 8.3325V19M1 19H19M10 4.75H10.0075V4.7575H10V4.75Z" stroke="black" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 19V10.75M13.75 19V10.75M6.25 19V10.75M1 7L10 1L19 7M17.5 19V8.3325C15.0563 7.94906 12.5514 7.75 10 7.75C7.44861 7.75 4.94372 7.94906 2.5 8.3325V19M1 19H19M10 4.75H10.0075V4.7575H10V4.75Z" stroke="black" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 19V10.75M13.75 19V10.75M6.25 19V10.75M1 7L10 1L19 7M17.5 19V8.3325C15.0563 7.94906 12.5514 7.75 10 7.75C7.44861 7.75 4.94372 7.94906 2.5 8.3325V19M1 19H19M10 4.75H10.0075V4.7575H10V4.75Z" stroke="black" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 19V10.75M13.75 19V10.75M6.25 19V10.75M1 7L10 1L19 7M17.5 19V8.3325C15.0563 7.94906 12.5514 7.75 10 7.75C7.44861 7.75 4.94372 7.94906 2.5 8.3325V19M1 19H19M10 4.75H10.0075V4.7575H10V4.75Z" stroke="black" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 19V10.75M13.75 19V10.75M6.25 19V10.75M1 7L10 1L19 7M17.5 19V8.3325C15.0563 7.94906 12.5514 7.75 10 7.75C7.44861 7.75 4.94372 7.94906 2.5 8.3325V19M1 19H19M10 4.75H10.0075V4.7575H10V4.75Z" stroke="black" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>  
                            <h1>Department</h1>
                        </div>
                    </a>
                </li>

                <li class="px-4 cursor-pointer">
                    <a href="dashboard-colleges.php">
                        <div class="flex p-3 rounded-md gap-x-3 hover:bg-[#F1F5F9] transition ease-in-out delay-100">
                            <svg width="22" height="19" viewBox="0 0 22 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.9999 15.7191C17.2474 15.7396 17.4978 15.75 17.7506 15.75C18.7989 15.75 19.8054 15.5708 20.741 15.2413C20.7473 15.1617 20.7506 15.0812 20.7506 15C20.7506 13.3431 19.4074 12 17.7506 12C17.123 12 16.5403 12.1927 16.0587 12.5222M16.9999 15.7191C17 15.7294 17 15.7397 17 15.75C17 15.975 16.9876 16.1971 16.9635 16.4156C15.2067 17.4237 13.1707 18 11 18C8.82933 18 6.79327 17.4237 5.03651 16.4156C5.01238 16.1971 5 15.975 5 15.75C5 15.7397 5.00003 15.7295 5.00008 15.7192M16.9999 15.7191C16.994 14.5426 16.6494 13.4461 16.0587 12.5222M16.0587 12.5222C14.9928 10.8552 13.1255 9.75 11 9.75C8.87479 9.75 7.00765 10.8549 5.94169 12.5216M5.94169 12.5216C5.46023 12.1925 4.87796 12 4.25073 12C2.59388 12 1.25073 13.3431 1.25073 15C1.25073 15.0812 1.25396 15.1617 1.26029 15.2413C2.19593 15.5708 3.2024 15.75 4.25073 15.75C4.50307 15.75 4.75299 15.7396 5.00008 15.7192M5.94169 12.5216C5.35071 13.4457 5.00598 14.5424 5.00008 15.7192M14 3.75C14 5.40685 12.6569 6.75 11 6.75C9.34315 6.75 8 5.40685 8 3.75C8 2.09315 9.34315 0.75 11 0.75C12.6569 0.75 14 2.09315 14 3.75ZM20 6.75C20 7.99264 18.9926 9 17.75 9C16.5074 9 15.5 7.99264 15.5 6.75C15.5 5.50736 16.5074 4.5 17.75 4.5C18.9926 4.5 20 5.50736 20 6.75ZM6.5 6.75C6.5 7.99264 5.49264 9 4.25 9C3.00736 9 2 7.99264 2 6.75C2 5.50736 3.00736 4.5 4.25 4.5C5.49264 4.5 6.5 5.50736 6.5 6.75Z" stroke="#64748B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.9999 15.7191C17.2474 15.7396 17.4978 15.75 17.7506 15.75C18.7989 15.75 19.8054 15.5708 20.741 15.2413C20.7473 15.1617 20.7506 15.0812 20.7506 15C20.7506 13.3431 19.4074 12 17.7506 12C17.123 12 16.5403 12.1927 16.0587 12.5222M16.9999 15.7191C17 15.7294 17 15.7397 17 15.75C17 15.975 16.9876 16.1971 16.9635 16.4156C15.2067 17.4237 13.1707 18 11 18C8.82933 18 6.79327 17.4237 5.03651 16.4156C5.01238 16.1971 5 15.975 5 15.75C5 15.7397 5.00003 15.7295 5.00008 15.7192M16.9999 15.7191C16.994 14.5426 16.6494 13.4461 16.0587 12.5222M16.0587 12.5222C14.9928 10.8552 13.1255 9.75 11 9.75C8.87479 9.75 7.00765 10.8549 5.94169 12.5216M5.94169 12.5216C5.46023 12.1925 4.87796 12 4.25073 12C2.59388 12 1.25073 13.3431 1.25073 15C1.25073 15.0812 1.25396 15.1617 1.26029 15.2413C2.19593 15.5708 3.2024 15.75 4.25073 15.75C4.50307 15.75 4.75299 15.7396 5.00008 15.7192M5.94169 12.5216C5.35071 13.4457 5.00598 14.5424 5.00008 15.7192M14 3.75C14 5.40685 12.6569 6.75 11 6.75C9.34315 6.75 8 5.40685 8 3.75C8 2.09315 9.34315 0.75 11 0.75C12.6569 0.75 14 2.09315 14 3.75ZM20 6.75C20 7.99264 18.9926 9 17.75 9C16.5074 9 15.5 7.99264 15.5 6.75C15.5 5.50736 16.5074 4.5 17.75 4.5C18.9926 4.5 20 5.50736 20 6.75ZM6.5 6.75C6.5 7.99264 5.49264 9 4.25 9C3.00736 9 2 7.99264 2 6.75C2 5.50736 3.00736 4.5 4.25 4.5C5.49264 4.5 6.5 5.50736 6.5 6.75Z" stroke="black" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.9999 15.7191C17.2474 15.7396 17.4978 15.75 17.7506 15.75C18.7989 15.75 19.8054 15.5708 20.741 15.2413C20.7473 15.1617 20.7506 15.0812 20.7506 15C20.7506 13.3431 19.4074 12 17.7506 12C17.123 12 16.5403 12.1927 16.0587 12.5222M16.9999 15.7191C17 15.7294 17 15.7397 17 15.75C17 15.975 16.9876 16.1971 16.9635 16.4156C15.2067 17.4237 13.1707 18 11 18C8.82933 18 6.79327 17.4237 5.03651 16.4156C5.01238 16.1971 5 15.975 5 15.75C5 15.7397 5.00003 15.7295 5.00008 15.7192M16.9999 15.7191C16.994 14.5426 16.6494 13.4461 16.0587 12.5222M16.0587 12.5222C14.9928 10.8552 13.1255 9.75 11 9.75C8.87479 9.75 7.00765 10.8549 5.94169 12.5216M5.94169 12.5216C5.46023 12.1925 4.87796 12 4.25073 12C2.59388 12 1.25073 13.3431 1.25073 15C1.25073 15.0812 1.25396 15.1617 1.26029 15.2413C2.19593 15.5708 3.2024 15.75 4.25073 15.75C4.50307 15.75 4.75299 15.7396 5.00008 15.7192M5.94169 12.5216C5.35071 13.4457 5.00598 14.5424 5.00008 15.7192M14 3.75C14 5.40685 12.6569 6.75 11 6.75C9.34315 6.75 8 5.40685 8 3.75C8 2.09315 9.34315 0.75 11 0.75C12.6569 0.75 14 2.09315 14 3.75ZM20 6.75C20 7.99264 18.9926 9 17.75 9C16.5074 9 15.5 7.99264 15.5 6.75C15.5 5.50736 16.5074 4.5 17.75 4.5C18.9926 4.5 20 5.50736 20 6.75ZM6.5 6.75C6.5 7.99264 5.49264 9 4.25 9C3.00736 9 2 7.99264 2 6.75C2 5.50736 3.00736 4.5 4.25 4.5C5.49264 4.5 6.5 5.50736 6.5 6.75Z" stroke="black" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.9999 15.7191C17.2474 15.7396 17.4978 15.75 17.7506 15.75C18.7989 15.75 19.8054 15.5708 20.741 15.2413C20.7473 15.1617 20.7506 15.0812 20.7506 15C20.7506 13.3431 19.4074 12 17.7506 12C17.123 12 16.5403 12.1927 16.0587 12.5222M16.9999 15.7191C17 15.7294 17 15.7397 17 15.75C17 15.975 16.9876 16.1971 16.9635 16.4156C15.2067 17.4237 13.1707 18 11 18C8.82933 18 6.79327 17.4237 5.03651 16.4156C5.01238 16.1971 5 15.975 5 15.75C5 15.7397 5.00003 15.7295 5.00008 15.7192M16.9999 15.7191C16.994 14.5426 16.6494 13.4461 16.0587 12.5222M16.0587 12.5222C14.9928 10.8552 13.1255 9.75 11 9.75C8.87479 9.75 7.00765 10.8549 5.94169 12.5216M5.94169 12.5216C5.46023 12.1925 4.87796 12 4.25073 12C2.59388 12 1.25073 13.3431 1.25073 15C1.25073 15.0812 1.25396 15.1617 1.26029 15.2413C2.19593 15.5708 3.2024 15.75 4.25073 15.75C4.50307 15.75 4.75299 15.7396 5.00008 15.7192M5.94169 12.5216C5.35071 13.4457 5.00598 14.5424 5.00008 15.7192M14 3.75C14 5.40685 12.6569 6.75 11 6.75C9.34315 6.75 8 5.40685 8 3.75C8 2.09315 9.34315 0.75 11 0.75C12.6569 0.75 14 2.09315 14 3.75ZM20 6.75C20 7.99264 18.9926 9 17.75 9C16.5074 9 15.5 7.99264 15.5 6.75C15.5 5.50736 16.5074 4.5 17.75 4.5C18.9926 4.5 20 5.50736 20 6.75ZM6.5 6.75C6.5 7.99264 5.49264 9 4.25 9C3.00736 9 2 7.99264 2 6.75C2 5.50736 3.00736 4.5 4.25 4.5C5.49264 4.5 6.5 5.50736 6.5 6.75Z" stroke="black" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.9999 15.7191C17.2474 15.7396 17.4978 15.75 17.7506 15.75C18.7989 15.75 19.8054 15.5708 20.741 15.2413C20.7473 15.1617 20.7506 15.0812 20.7506 15C20.7506 13.3431 19.4074 12 17.7506 12C17.123 12 16.5403 12.1927 16.0587 12.5222M16.9999 15.7191C17 15.7294 17 15.7397 17 15.75C17 15.975 16.9876 16.1971 16.9635 16.4156C15.2067 17.4237 13.1707 18 11 18C8.82933 18 6.79327 17.4237 5.03651 16.4156C5.01238 16.1971 5 15.975 5 15.75C5 15.7397 5.00003 15.7295 5.00008 15.7192M16.9999 15.7191C16.994 14.5426 16.6494 13.4461 16.0587 12.5222M16.0587 12.5222C14.9928 10.8552 13.1255 9.75 11 9.75C8.87479 9.75 7.00765 10.8549 5.94169 12.5216M5.94169 12.5216C5.46023 12.1925 4.87796 12 4.25073 12C2.59388 12 1.25073 13.3431 1.25073 15C1.25073 15.0812 1.25396 15.1617 1.26029 15.2413C2.19593 15.5708 3.2024 15.75 4.25073 15.75C4.50307 15.75 4.75299 15.7396 5.00008 15.7192M5.94169 12.5216C5.35071 13.4457 5.00598 14.5424 5.00008 15.7192M14 3.75C14 5.40685 12.6569 6.75 11 6.75C9.34315 6.75 8 5.40685 8 3.75C8 2.09315 9.34315 0.75 11 0.75C12.6569 0.75 14 2.09315 14 3.75ZM20 6.75C20 7.99264 18.9926 9 17.75 9C16.5074 9 15.5 7.99264 15.5 6.75C15.5 5.50736 16.5074 4.5 17.75 4.5C18.9926 4.5 20 5.50736 20 6.75ZM6.5 6.75C6.5 7.99264 5.49264 9 4.25 9C3.00736 9 2 7.99264 2 6.75C2 5.50736 3.00736 4.5 4.25 4.5C5.49264 4.5 6.5 5.50736 6.5 6.75Z" stroke="black" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.9999 15.7191C17.2474 15.7396 17.4978 15.75 17.7506 15.75C18.7989 15.75 19.8054 15.5708 20.741 15.2413C20.7473 15.1617 20.7506 15.0812 20.7506 15C20.7506 13.3431 19.4074 12 17.7506 12C17.123 12 16.5403 12.1927 16.0587 12.5222M16.9999 15.7191C17 15.7294 17 15.7397 17 15.75C17 15.975 16.9876 16.1971 16.9635 16.4156C15.2067 17.4237 13.1707 18 11 18C8.82933 18 6.79327 17.4237 5.03651 16.4156C5.01238 16.1971 5 15.975 5 15.75C5 15.7397 5.00003 15.7295 5.00008 15.7192M16.9999 15.7191C16.994 14.5426 16.6494 13.4461 16.0587 12.5222M16.0587 12.5222C14.9928 10.8552 13.1255 9.75 11 9.75C8.87479 9.75 7.00765 10.8549 5.94169 12.5216M5.94169 12.5216C5.46023 12.1925 4.87796 12 4.25073 12C2.59388 12 1.25073 13.3431 1.25073 15C1.25073 15.0812 1.25396 15.1617 1.26029 15.2413C2.19593 15.5708 3.2024 15.75 4.25073 15.75C4.50307 15.75 4.75299 15.7396 5.00008 15.7192M5.94169 12.5216C5.35071 13.4457 5.00598 14.5424 5.00008 15.7192M14 3.75C14 5.40685 12.6569 6.75 11 6.75C9.34315 6.75 8 5.40685 8 3.75C8 2.09315 9.34315 0.75 11 0.75C12.6569 0.75 14 2.09315 14 3.75ZM20 6.75C20 7.99264 18.9926 9 17.75 9C16.5074 9 15.5 7.99264 15.5 6.75C15.5 5.50736 16.5074 4.5 17.75 4.5C18.9926 4.5 20 5.50736 20 6.75ZM6.5 6.75C6.5 7.99264 5.49264 9 4.25 9C3.00736 9 2 7.99264 2 6.75C2 5.50736 3.00736 4.5 4.25 4.5C5.49264 4.5 6.5 5.50736 6.5 6.75Z" stroke="black" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.9999 15.7191C17.2474 15.7396 17.4978 15.75 17.7506 15.75C18.7989 15.75 19.8054 15.5708 20.741 15.2413C20.7473 15.1617 20.7506 15.0812 20.7506 15C20.7506 13.3431 19.4074 12 17.7506 12C17.123 12 16.5403 12.1927 16.0587 12.5222M16.9999 15.7191C17 15.7294 17 15.7397 17 15.75C17 15.975 16.9876 16.1971 16.9635 16.4156C15.2067 17.4237 13.1707 18 11 18C8.82933 18 6.79327 17.4237 5.03651 16.4156C5.01238 16.1971 5 15.975 5 15.75C5 15.7397 5.00003 15.7295 5.00008 15.7192M16.9999 15.7191C16.994 14.5426 16.6494 13.4461 16.0587 12.5222M16.0587 12.5222C14.9928 10.8552 13.1255 9.75 11 9.75C8.87479 9.75 7.00765 10.8549 5.94169 12.5216M5.94169 12.5216C5.46023 12.1925 4.87796 12 4.25073 12C2.59388 12 1.25073 13.3431 1.25073 15C1.25073 15.0812 1.25396 15.1617 1.26029 15.2413C2.19593 15.5708 3.2024 15.75 4.25073 15.75C4.50307 15.75 4.75299 15.7396 5.00008 15.7192M5.94169 12.5216C5.35071 13.4457 5.00598 14.5424 5.00008 15.7192M14 3.75C14 5.40685 12.6569 6.75 11 6.75C9.34315 6.75 8 5.40685 8 3.75C8 2.09315 9.34315 0.75 11 0.75C12.6569 0.75 14 2.09315 14 3.75ZM20 6.75C20 7.99264 18.9926 9 17.75 9C16.5074 9 15.5 7.99264 15.5 6.75C15.5 5.50736 16.5074 4.5 17.75 4.5C18.9926 4.5 20 5.50736 20 6.75ZM6.5 6.75C6.5 7.99264 5.49264 9 4.25 9C3.00736 9 2 7.99264 2 6.75C2 5.50736 3.00736 4.5 4.25 4.5C5.49264 4.5 6.5 5.50736 6.5 6.75Z" stroke="black" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <h1>College</h1>
                        </div>
                    </a>
                </li>
            </ul>
        </div>

        <div class="px-4 pb-5 cursor-pointer">
            <a href="">
                <div class="flex p-3 gap-x-3 ">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 3.25C12.1989 3.25 12.3897 3.32902 12.5303 3.46967C12.671 3.61032 12.75 3.80109 12.75 4C12.75 4.19891 12.671 4.38968 12.5303 4.53033C12.3897 4.67098 12.1989 4.75 12 4.75C10.0772 4.75 8.23311 5.51384 6.87348 6.87348C5.51384 8.23311 4.75 10.0772 4.75 12C4.75 13.9228 5.51384 15.7669 6.87348 17.1265C8.23311 18.4862 10.0772 19.25 12 19.25C12.1989 19.25 12.3897 19.329 12.5303 19.4697C12.671 19.6103 12.75 19.8011 12.75 20C12.75 20.1989 12.671 20.3897 12.5303 20.5303C12.3897 20.671 12.1989 20.75 12 20.75C9.67936 20.75 7.45376 19.8281 5.81282 18.1872C4.17187 16.5462 3.25 14.3206 3.25 12C3.25 9.67936 4.17187 7.45376 5.81282 5.81282C7.45376 4.17187 9.67936 3.25 12 3.25Z" fill="#FF0B47"/>
                        <path d="M16.47 9.52997C16.3375 9.38779 16.2654 9.19975 16.2688 9.00545C16.2723 8.81115 16.351 8.62576 16.4884 8.48835C16.6258 8.35093 16.8112 8.27222 17.0055 8.26879C17.1998 8.26537 17.3878 8.33749 17.53 8.46997L20.53 11.47C20.6705 11.6106 20.7493 11.8012 20.7493 12C20.7493 12.1987 20.6705 12.3893 20.53 12.53L17.53 15.53C17.4613 15.6037 17.3785 15.6628 17.2865 15.7038C17.1945 15.7447 17.0952 15.7668 16.9945 15.7686C16.8938 15.7703 16.7938 15.7518 16.7004 15.7141C16.607 15.6764 16.5222 15.6202 16.451 15.549C16.3797 15.4778 16.3236 15.393 16.2859 15.2996C16.2482 15.2062 16.2296 15.1061 16.2314 15.0054C16.2332 14.9047 16.2552 14.8054 16.2962 14.7134C16.3372 14.6214 16.3963 14.5386 16.47 14.47L18.19 12.75H10C9.80109 12.75 9.61032 12.671 9.46967 12.5303C9.32902 12.3896 9.25 12.1989 9.25 12C9.25 11.8011 9.32902 11.6103 9.46967 11.4696C9.61032 11.329 9.80109 11.25 10 11.25H18.19L16.47 9.52997Z" fill="#FF0B47"/>
                    </svg>
                    <h1>Logout</h1>
                </div>
            </a>
        </div>
    </aside>

    <div class="flex flex-col bg-[#1A0D2E] w-screen h-screen gap-y-5 p-5">
        <div class="flex justify-between w-full">
            <h1 class="font-bold text-white text-2xl">Departments</h1>

            <div class="flex cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="white" d="M15 19.88c.04.3-.06.62-.29.83a.996.996 0 0 1-1.41 0L9.29 16.7a.989.989 0 0 1-.29-.83v-5.12L4.21 4.62a1 1 0 0 1 .17-1.4c.19-.14.4-.22.62-.22h14c.22 0 .43.08.62.22a1 1 0 0 1 .17 1.4L15 10.75zM7.04 5L11 10.06v5.52l2 2v-7.53L16.96 5z"/></svg>
                <h2 class="font-medium text-white">Filter</h2>
            </div>
        </div>

        <!-- <div class="flex flex-row gap-x-6 items-center">
            <button type="button" data-modal-target="add-program" data-modal-toggle="add-program" class="bg-[#9D59EF] gap-x-2 pr-4 pl-5 py-3 flex hover:bg-[#673EEF] transition ease-in-out delay-100">
                <h1 class="text-white">Add Departments</h1>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M12 4L12 20" stroke="white" stroke-width="2"/>
                    <path d="M4 12L20 12" stroke="white" stroke-width="2"/>
                </svg>
            </button>
        </div> -->
        <li class="group" tabindex="0"></li>

        <div class="relative overflow-x-auto table-container">
            <table class="w-full text-sm text-left rtl:text-right text-white">
                <thead class="text-xs text-white uppercase bg-[#9D59EF]">
                    <tr>
                        <th scope="col" class="px-5 py-3">
                            Program ID
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Program
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Program abbrv.
                        </th>
                        <th scope="col" class="px-5 py-3">
                            College
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Department
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Action
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $query = "SELECT progid, progfullname, progshortname, c.collfullname AS college, d.deptfullname AS department
                    FROM programs p
                    INNER JOIN colleges c ON p.progcollid = c.collid
                    INNER JOIN departments d ON p.progcolldeptid = d.deptid";          
          
                    $result = mysqli_query($conn, $query);
                    
                    if (!$result) {
                        echo "Error: " . mysqli_error($conn);
                    } else {
                        if (mysqli_num_rows($result) === 0) {
                            echo '<tr><td colspan="8" class="px-5 py-4 text-black">No data found.</td></tr>';
                        } else {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr class="bg-white border-b">';
                                echo '<th scope="row" class="px-6 py-4 font-bold text-[#9D59EF] whitespace-nowrap">' . $row['progid'] . '</th>';
                                echo '<td class="px-5 py-4 text-black">' . $row['progfullname'] . '</td>';
                                echo '<td class="px-5 py-4 text-black">' . $row['progshortname'] . '</td>';
                                echo '<td class="px-5 py-4 text-black">' . $row['college'] . '</td>';
                                echo '<td class="px-5 py-4 text-black">' . $row['department'] . '</td>';
                                echo '<td class="px-5 py-4 text-black flex gap-x-2">';
                                echo '<button class="bg-[#9D59EF] px-5 py-1 text-white" data-modal-target="edit-program" data-modal-toggle="edit-program" onclick="setProgramToEdit(' . $row['progid'] . ')">Edit</button>';
                                echo '<button class="bg-[#FF0B47] px-5 py-1 text-white" data-modal-target="delete-program" data-modal-toggle="delete-program" onclick="setProgramToDelete(' . $row['progid'] . ')">Delete</button>';
                                echo '</td>';
                                echo '</tr>';
                            }
                        }
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- modal add progra -->
    <?php include 'modals/modal_add_program.php';?>
    
    <!-- modal edit program -->
    <?php include 'modals/modal_edit_program.php'?>
    
    <!-- modal delete program -->
    <?php include 'modals/modal_delete_program.php'?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script>
        function setProgramToEdit(progid) {
            document.getElementById('progidToEdit').value = progid;
        }

        function setProgramToDelete(progid) {
            document.getElementById('progidToDelete').value = progid;
        }
    </script>
</body>
</html>