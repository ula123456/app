<!DOCTYPE html>
<html>
<head>
    <style >body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f9;
    color: #333;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h1 {
    text-align: center;
    color: #4CAF50;
}

form {
    margin-top: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

textarea, select, input[type="submit"] {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
    box-sizing: border-box;
}

textarea {
    height: 100px;
}

input[type="submit"] {
    background: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    transition: background 0.3s ease;
}

input[type="submit"]:hover {
    background: #45a049;
}

#result {
    margin-top: 20px;
    padding: 10px;
    background: #e7f3e7;
    border: 1px solid #c1e1c1;
    border-radius: 5px;
    color: #4CAF50;
    font-size: 1.1em;
    white-space: pre-wrap;
}
</style>
    <meta charset="UTF-8">
    <title>Транслитерация текста</title>
    
</head>
<body>
    <div class="container">
        <h1>Текст транслитерацияси </h1>
        <form id="translit-form" action="{{route('translit')}}" method="get">
            <div class="form-group">
                <label for="text">Матн киритинг:</label>
                <textarea name="title" id="text" required>{{$text ?? ''}}</textarea>
            </div>
            <div class="form-group">
                <label for="language">Йуналишни танланг:</label>
                <select name="action" id="language">
                    <option value="cyril">Лотиндан в Кирилга</option>
                    <option value="lotin">Кирилдан в Лотинга</option>

                    
                </select>



            </div>
           
            <input type="submit" name="translit" value="ugirish">
            
        </form>
        <h2>Натижа</h2>
        <div id="result"><textarea name="body" type="text" rows="12" cols="50" > {{$result ?? ''}} </textarea></div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
