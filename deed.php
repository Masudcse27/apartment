<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:admin.php");
}
error_reporting(0);
include ('includes/db-config.php');

?>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

<body onload="window.print()" style="background-color: white !important;">
    <div class="h-fit w-full p-2 font-bold underline flex justify-center items-center">ঘর ভাড়ার চুক্তিনামা</div>
    <div class="min-h-screen flex flex-col justify-start items-start ml-4 py-2">
        <p class="h-[5vh] mt-5">আমি / আমরা,
            ...........
            <?= $_SESSION['tenantName'] ?>...................................................
        <div class="h-[150px] w-[150px] absolute right-0 border border-black"></div>
        </p>
        <p class="h-[5vh] mt-2">পিতা / স্বামীর নাম :
            .............
            <?= $_SESSION['fName'] ?>.................................
        </p>
        <p class="h-[5vh] mt-2">স্থায়ী ঠিকানা :
            ..........
            <?= $_SESSION['pAdd'] ?>.......................
        </p>
        <p class="h-[5vh] mt-2"><span>গ্রাম : ...
                <?= $_SESSION['vill'] ?>...
            </span><span>পোস্ট অফিস :
                ...
                <?= $_SESSION['po'] ?>...
            </span><span>থানা : ...
                <?= $_SESSION['ps'] ?>...
            </span></p>
        <p class="h-[5vh] mt-2"> <span>জিলা : ...
                <?= $_SESSION['district'] ?>....
            </span><span>ফোন /
                মোবাইল :
                ...
                <?= $_SESSION['tenantContact'] ?>...
            </span></p>
        <p class="h-[5vh] mt-2">জাতীয় পরিচয়পত্রের নং :
            ....
            <?= $_SESSION['nidno'] ?>.......
        </p>
        <p class="mt-2">নিম্ন লিখিত শর্তে বাকলিয়া, কে বি আমান আলী রোডে অবস্থিত - <b>ডা: কমরুল আলম</b>, পিতা : মরহুম
            ছালে আহমদ - এর মালিকানাধীন ভবনের, ...
            <?= $_SESSION['apartment'] ?>... নং ফ্ল্যাট, ...
            <?= $_SESSION['monRent'] ?>..
            টাকা
            (কথায় ....
            <?= $_SESSION['monRentWords'] ?>..... ) (<b>গ্যাস ও বিদ্যুৎ বিল
                ব্যতীত</b>) মাসিক ভাড়ার জন্য চুক্তি
            সম্পাদন করলাম।
        </p>
        <p class="mt-4 flex flex-col">
            <span>(১) মাসিক ভাড়া প্রতি <b><u>চলতি মাসের প্রথম সপ্তাহে</u></b> পরিশোধ করিতে হইব। </span>
            <span>(২) গ্যাস ও বিদ্যুৎ বিল সরকারি বিল অনুযায়ী জমা দেয়ার শেষ এক সপ্তাহ আগে পরিশোধ করিতে হইবে। </span>
            <span>(৩) <u><b>এক মাসের অগ্রিম ভাড়া সিকিউরিটি মানি</b></u> হিসেবে জমা থাকিবে। </span>
            <span>(৪) বৈদ্যুতিক সরঞ্জাম / সেনিটারি সরঞ্জাম নষ্ট হইলে নিজ খরচে মেরামত করিতে হইবে। </span>
            <span>(৫) প্রতি ................................. বছর পর পর ................................... হরে ঘর ভাড়া
                বৃদ্ধি হইবে। </span>
            <span>(৬) ঘর ছাড়িয়া দেয়ার পুর্বে উভয় পক্ষ <b><u>নূন্যতম দুই মাস</u></b> আগে লিখিত নোটিশের মাধ্যমে জানাতে
                হইবে।
            </span>
            <span>(৭) আশে পাশের অন্যান্য ভাড়াটিয়ার শান্তি বিঘ্নিত হয় এরূপ কাজ থেকে বিরত থাকিতে হইবে। </span>
            <span>(৮) ঘর ছাড়িয়া দেয়ার সময় কোন বৈদ্যুতিক বা সেনিটারি সরঞ্জাম বা ঘরের কোন দরজা / জানালা বা অন্য কোন প্রকার
                ক্ষতি হইলে টা সিকিউরিটি মানি হইতে কর্তন করা হইবে। </span>
            <span class="mt-2">উক্ত শর্ত মানিয়া লইয়া নিম্নে স্বাক্ষর করিলাম ,</span>
        </p>
        <p class="mt-12 flex justify-between items-center w-[90vw]">
            <span>.......................................................</span>
            <span>.......................................................</span>
        </p>
        <p class="mt-2 flex justify-between items-center w-[90vw]">
            <span>জমিদারের স্বাক্ষর / তারিখ </span>
            <span>ভাড়াটিয়ার স্বাক্ষর / তারিখ </span>
        </p>

    </div>
</body>

<?php
include ('includes/footer.php');
?>