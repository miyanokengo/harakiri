/*
    リアルタイムにやり取りのできるチャットアプリの開発
    ■仕様
    ・名前の入力欄と発言の入力欄が存在する
    ・名前と発言の入力欄に記入して「送信」ボタンを押すと
    発言の表示欄に送信者の名前と、発言内容と、発言した日時が表示される
    ・発言の表示欄は常に1秒おきに最新の発言が表示され、時系列順にログが表示される
    ・これらの処理を画面を遷移させずfetchによる非同期処理で実現させること
*/

//チャットのログを表示するテーブルの要素を取得
let logDisplayElm = document.querySelector('table')
//送信用のフォーム要素の取得
let myForm = document.forms.myForm

//送信用URL
const insertURL = 'http://localhost/harakiri/api/home.php'
//受信用URL
const selectURL = 'http://localhost/harakiri/api/home.php'

//受信処理
//初期表示用に一度動かす
getPost()
//1秒おきに取得
setInterval(getPost, 1000)

function getPost() {
    // 投稿の取得用PHPに対してGETでidを送信する
    fetch(selectURL)
    // select.phpのJSONをJSのオブジェクトに変換する
    .then((res) => res.json())
    .then((json) => {
        //テーブルの中にあるHTMLをすべて削除する
        document.getElementById('table-body').innerHTML="";
        // JSONデータを受け取った後の処理
        json.forEach((value) => {
            console.log(value);

            let tr = document.createElement('tr');

            let userTd = document.createElement('td');
            userTd.textContent = value.user_id;
            let contentTd = document.createElement('td');
            contentTd.textContent = value.content;
            let created_atTd = document.createElement('td');
            created_atTd.textContent = value.created_at;
            let nicepointTd = document.createElement('td');
            nicepointTd.textContent = value.nicepoint;
            let imageTd = document.createElement('td');
            imageTd.textContent = value.image;

            tr.appendChild(userTd);
            tr.appendChild(contentTd);
            tr.appendChild(created_atTd);
            tr.appendChild(nicepointTd);
            tr.appendChild(imageTd);
            
            document.getElementById('table-body').appendChild(tr);
        });
    
    })
    
}

// //送信処理
// //フォームが送信された時にイベントが発火する
// myForm.addEventListener('submit', (e) => {
//     //preventDefaultで実際の送信は行わない（画面の遷移をしないようにする）
//     e.preventDefault()
//     //フォームの送信データを取得
//     let formData = new FormData(myForm)

//     //fetchを使ってフォームのデータをPOSTで送信する
//     fetch(insertURL, {
//         method: 'POST',
//         body: formData,
//     })
//     .then(res => {
//         //送信後に発言内容のフォームを空にする
//         myForm.talk.value = ''
//     })

    

// })
document.getElementById('postForm').addEventListener('submit', async function(event) {
    event.preventDefault(); // デフォルトのフォーム送信を防止


    //フォームデータを取得
    const form = event.target;
    const formData = new FormData(form);
    console.log(formData);
    
    try {
        const response = await fetch('http://localhost/harakiri/api/postresult.php', {
            method: 'POST',
            body: formData
        })
        .then(res => {
            console.log("ここまで通った");
            console.log(res.text());
        });
    } catch (error) {
        console.log('エラーが発生しました: ' + error.message);
    }
});


