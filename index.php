<?php 
require_once ('db_connect.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet" type="text/css">
    <title>timeline</title>
</head>
<body>
    <div class="header">
        <h2>MCLタイムライン</h2>
    </div>
    <div class=""></div>

    <p id="tabcontrol">
        <a href="#tabpage1">home</a>
        <a href="#tabpage2">serch</a>
        <a href="#tabpage3">circle</a>
        
     
    </p>
    
    <div id="tabbody">
        <div id="tabpage1">
         <!-- ここにタイムラインを表示(一覧のみ) -->
      
         
         
         
         
         </div>
        <div id="tabpage2">
            <form action="サイトURL" method="get">
            <input type="search" name="search" placeholder="キーワードを入力">
            <input type="submit" name="submit" value="検索">
            </form>

        </div>
        <div id="tabpage3">…… タブ3の中身 ……</div>
     </div>

     <script type="text/javascript">
        // ---------------------------
        // ▼A：対象要素を得る
        // ---------------------------
        var tabs = document.getElementById('tabcontrol').getElementsByTagName('a');
        var pages = document.getElementById('tabbody').getElementsByTagName('div');
        
        // ---------------------------
        // ▼B：タブの切り替え処理
        // ---------------------------
        function changeTab() {
           // ▼B-1. href属性値から対象のid名を抜き出す
           var targetid = this.href.substring(this.href.indexOf('#')+1,this.href.length);
        
           // ▼B-2. 指定のタブページだけを表示する
           for(var i=0; i<pages.length; i++) {
              if( pages[i].id != targetid ) {
                 pages[i].style.display = "none";
              }
              else {
                 pages[i].style.display = "block";
              }
           }
        
           // ▼B-3. クリックされたタブを前面に表示する
           for(var i=0; i<tabs.length; i++) {
              tabs[i].style.zIndex = "0";
           }
           this.style.zIndex = "10";
        
           // ▼B-4. ページ遷移しないようにfalseを返す
           return false;
        }
        
        // ---------------------------
        // ▼C：すべてのタブに対して、クリック時にchangeTab関数が実行されるよう指定する
        // ---------------------------
        for(var i=0; i<tabs.length; i++) {
           tabs[i].onclick = changeTab;
        }
        
        // ---------------------------
        // ▼D：最初は先頭のタブを選択しておく
        // ---------------------------
        tabs[0].onclick();
        
        </script>
    <div class="footer">
        
    </div>
    
</body>
</html>