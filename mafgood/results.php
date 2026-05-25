<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نتائج البحث</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{
            display: grid;
        }
        .card-img-right {
            width: 300px; /* تحديد عرض الصورة */
            height: 300px; /* تحديد ارتفاع الصورة */
            object-fit: cover; /* لضمان أن الصورة تغطي المساحة المحددة */
            margin-left: 15px; /* مسافة بين الصورة والنص */
            border-radius: 10px; /* زوايا دائرية للصورة */
        }
        .card-body {
            text-align: right; /* محاذاة النص إلى اليمين */
            padding: 20px; /* مسافة داخلية */
            background-color: #f8f9fa; /* لون خلفية فاتح */
            border-radius: 10px; /* زوايا دائرية */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* ظل خفيف */
        }
        .card {
            display: flex;
            flex-direction: row-reverse; /* لجعل الصورة على اليمين */
            align-items: center; /* محاذاة العناصر عموديًا في الوسط */
            margin-bottom: 20px; /* مسافة بين البطاقات */
            border: none; /* إزالة الحدود الافتراضية */
        }
        .card-text {
            margin-bottom: 10px; /* مسافة بين النصوص */
            font-size: 1rem; /* حجم الخط */
            color: #333; /* لون النص */
        }
        .card-title {
            font-size: 1.25rem; /* حجم أكبر لعنوان العمود */
            font-weight: bold; /* جعل الخط عريض */
            margin-bottom: 15px; /* مسافة بين العنوان والنتائج */
            color: #020b14; /* لون أزرق للعنوان */
        }
        .container {
            max-width: 900px; /* تحديد عرض الحاوية */
        }
        .result-item {
            display: flex;
            justify-content: space-between; /* توزيع العناصر بين اليمين والشمال */
            margin-bottom: 10px; /* مسافة بين العناصر */
        }
        .result-key {
            font-size: 1.25rem; /* حجم أكبر لعنوان العمود */
            font-weight: bold; /* جعل الخط عريض */
            color: #007bff; /* لون أزرق للعنوان */
            text-align: left; /* محاذاة العنوان إلى اليمين */
            margin-left: 10px; /* مسافة صغيرة بين العنوان والنتيجة */
        }
        .result-value {
            font-size: 1rem; /* حجم الخط للنتيجة */
            color: #333; /* لون النص */
            text-align: right; /* محاذاة النتيجة إلى اليسار */
            margin-right: 10px; /* مسافة صغيرة بين العنوان والنتيجة */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 id="search-title">نتائج البحث عن: </h2>
        <div id="results-container" class="row">
            <!-- سيتم إضافة النتائج هنا -->
        </div>
    </div>
    
    <script>
        // قراءة النتائج من localStorage
        const results = JSON.parse(localStorage.getItem('searchResults'));
        const query = localStorage.getItem('searchQuery'); // قراءة الكلمة المدخلة من localStorage
        if (query) {
            document.getElementById('search-title').textContent += query; // إضافة الكلمة المدخلة إلى العنوان
        }
        // قاموس لترجمة عناوين الأعمدة
        const columnTranslations = {
            'name': 'الاسم',
            'age': 'العمر',
            'email': 'البريد الإلكتروني',
            'address': 'العنوان',
            'phone': 'الهاتف',
            // أضف المزيد من الترجمات حسب الحاجة
        };
        if (results && results.length > 0) {
            const resultsContainer = document.getElementById('results-container');
            results.forEach(result => {
                const col = document.createElement('div');
                col.className = 'col-md-12 mb-4';
                const card = document.createElement('div');
                card.className = 'card';
                if (result.image) {
                    const img = document.createElement('img');
                    img.src = result.image; // افتراض أن مسار الصورة موجود في عمود 'image'
                    img.className = 'card-img-right';
                    img.alt = 'Image';
                    card.appendChild(img);
                }
                const cardBody = document.createElement('div');
                cardBody.className = 'card-body';
                Object.keys(result).forEach(key => {
                    if (key !== 'image' && key !== 'id') { // استثناء عمود 'id'
                        const resultItem = document.createElement('div');
                        resultItem.className = 'result-item';
                        const resultKey = document.createElement('span');
                        resultKey.className = 'result-key';
                       
                        const resultValue = document.createElement('span');
                        resultValue.className = 'result-value';
                        resultValue.textContent = result[key];
                        resultItem.appendChild(resultKey); // إضافة العنوان أولاً
                        resultItem.appendChild(resultValue); // إضافة النتيجة بعد العنوان
                        cardBody.appendChild(resultItem);
                    }
                });
                card.appendChild(cardBody);
                col.appendChild(card);
                resultsContainer.appendChild(col);
            });
        } else {
            document.body.innerHTML = '<div class="container mt-5"><h2>لا توجد نتائج</h2></div>';
        }

    </script>
</body>
</html>
