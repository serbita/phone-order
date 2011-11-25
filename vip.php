<!DOCTYPE html>
<head>
</head>
<body>

<div class="content">
        <h1>Henry & Ford bar</h1>
        <h2>Mesa 4</h2>
        <ul>
                <li>Fernet branca</li>
                <li>$15</li>
        </ul>
        <form action="order.php" method="post">
                <label>Fernet Branca Vaso</label>
                <input id="item_id" type="text" value="1">
                <select name="quantity">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                </select>
                <input id="table_id" type="hidden" value="4">
                <input id="axn" type="hidden" value="confirm">
                <input type="submit" value="Pedir esta bebida!!!">
        </form>
        <img src="img/fernet-vaso.png">
</div>
<div class="footer"> 
        <p>This is the footer</p>
</div> 
</body>
