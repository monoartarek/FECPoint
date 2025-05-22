<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSE বিএসসি প্রোগ্রাম</title>
    <link rel="stylesheet" href="responsive.css">
    <style>
        body {
            padding-top: 50px;
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h1, h2 {
            color: #333;
        }
        p {
            line-height: 1.6;
        }
        ul {
            margin-left: 20px;
        }
        .container {
            max-width: 800px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }
        .toggle-content {
            display: none;
            margin-top: 10px;
        }
        .toggle-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 5px;
        }
    </style>
</head>
         <!-- Include Header -->
         <?php include 'header.php'; ?>
<body>
    <div class="container">
        <h1>কম্পিউটার সায়েন্স অ্যান্ড ইঞ্জিনিয়ারিং (CSE) বিএসসি প্রোগ্রাম</h1>
        
        <h2>প্রোগ্রাম পরিচিতি</h2>
        <p>বাংলাদেশে CSE একটি জনপ্রিয় ও চাহিদাসম্পন্ন ইঞ্জিনিয়ারিং শাখা। এই প্রোগ্রামে নিম্নলিখিত বিষয়গুলি পড়ানো হয়:</p>
        <ul>
            <li>প্রোগ্রামিং ভাষা (C, C++, Java, Python)</li>
            <li>ডেটা স্ট্রাকচার ও অ্যালগরিদম</li>
            <li>ওয়েব ও মোবাইল অ্যাপ ডেভেলপমেন্ট</li>
            <li>আর্টিফিশিয়াল ইন্টেলিজেন্স (AI) ও মেশিন লার্নিং</li>
            <li>ডেটাবেজ ম্যানেজমেন্ট সিস্টেম (DBMS)</li>
            <li>সাইবার সিকিউরিটি ও নেটওয়ার্কিং</li>
        </ul>

        <h2>চাকরির ক্ষেত্র</h2>
        <p>CSE গ্র্যাজুয়েটদের জন্য অনেক কর্মসংস্থানের সুযোগ রয়েছে, যেমন:</p>
        <ul>
    <li>সফটওয়্যার ডেভেলপমেন্ট</li>
    <li>ওয়েব ডেভেলপমেন্ট</li>
    <li>মোবাইল অ্যাপ ডেভেলপমেন্ট</li>
    <li>ডাটা সায়েন্স ও মেশিন লার্নিং</li>
    <li>সাইবার সিকিউরিটি</li>
    <li>ডাটাবেস অ্যাডমিনিস্ট্রেশন</li>
    <li>ক্লাউড কম্পিউটিং</li>
    <li>নেটওয়ার্কিং ও সিস্টেম অ্যাডমিনিস্ট্রেশন</li>
    <li>কৃত্রিম বুদ্ধিমত্তা (AI) ও রোবোটিক্স</li>
    <li>গেম ডেভেলপমেন্ট</li>
    <li>আইটি সাপোর্ট ও টেকনিক্যাল সার্ভিস</li>
    <li>এম্বেডেড সিস্টেম ও IoT</li>
    <li>UI/UX ডিজাইন</li>
    <li>ফ্রিল্যান্সিং ও রিমোট জব</li>
    <li>ডিজিটাল মার্কেটিং ও SEO (টেক-সম্পর্কিত)</li>
    <li>শিক্ষা ও গবেষণা (একাডেমিয়া)</li>
    <li>বিগ ডাটা অ্যানালিটিক্স</li>
    <li>ব্লকচেইন টেকনোলজি</li>
    <li>ERP সফটওয়্যার ডেভেলপমেন্ট</li>
    <li>ই-কমার্স টেকনোলজি</li>
    <li>হেলথটেক (মেডিক্যাল সফটওয়্যার ডেভেলপমেন্ট)</li>
</ul>

        <h2>ফ্রেশারদের করণীয়</h2>
        <button class="toggle-button" onclick="toggleContent()">বিস্তারিত দেখুন</button>
        <div class="toggle-content" id="toggleContent">
            <p>CSE গ্র্যাজুয়েটদের জন্য কিছু গুরুত্বপূর্ণ পরামর্শ:</p>
            <ul>
                <li>প্রোগ্রামিং দক্ষতা বৃদ্ধি করতে প্রতিদিন Codeforces, Leetcode চর্চা করুন।</li>
                <li>সার্টিফিকেট কোর্স (AWS, Google Cloud, Microsoft Certified) গ্রহণ করুন।</li>
                <li>ওপেন সোর্স প্রোজেক্টে কাজ করুন (GitHub ব্যবহার করুন)।</li>
                <li>সফটওয়্যার কোম্পানিতে ইন্টার্নশিপ করুন।</li>
                <li>LinkedIn ও GitHub প্রোফাইল শক্তিশালী করুন।</li>
            </ul>
        </div>
    </div>

    <script>
        function toggleContent() {
            var content = document.getElementById("toggleContent");
            if (content.style.display === "none" || content.style.display === "") {
                content.style.display = "block";
            } else {
                content.style.display = "none";
            }
        }
    </script>
</body>
</html>
