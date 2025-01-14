# アプリケーション名
**松本家架空日記（第2回松本家展作品）**  
URL : http://ec2-52-197-61-161.ap-northeast-1.compute.amazonaws.com/
<br>
※10月中旬を目途にアクセスできなくなります
<br>
<br>

# 説明
### 第2回松本家展とは
第2回松本家展では第1回-現在地-を引き継いで松本家の歴史を探ります。 松本家が位置する広谷地地区の歴史は古く縄文時代から人の居住が確認されています。 遠い過去の歴史は遺物や学術調査を通じて考察される対象である一方、個人的な体験と結びついてその後の人生に影響を与える記憶を作ることもあります。 対して、思い出として語られるような近過去の出来事は個人的実感に溢れるがゆえに、 他者が記録し語り直すことではじめて歴史として客観的に扱える対象となるものでもあります。 本展では記録と記憶を行き来しながら松本家の土地と人々の歴史に目を向けます。 実物が残されている場合についてはできるだけ現物を展示し、思い出話として語られる歴史については影絵劇を用いてシーンの再構築を試みました。 過去を記録し、物語ることは、これからの松本家のカタチを想像するための補助線を引く行為となるでしょう。
![IMG_1050](https://user-images.githubusercontent.com/77391181/194599113-9c4e584f-6de2-443f-bb7f-7b335ad4735f.JPG)
<br><br>
### 松本家架空日記とは
現在の私たちが松本家の歴史に参加し続きの物語を紡ぐことができるように『松本家架空日記』を用意しました。架空の日記を書くことを通じてみなさんは歴史の隠れた1ページあるいはこれから先の1ページに参加することができます。登場人物はあなたでもあなたではない誰かでも構いません。ある縄文時代から遥か未来までのどこか1日を選んで松本家で起こるかもしれないある日の物語を書いてください。手書きの用紙でもwebサイトの特設フォームからでも参加いただけます。投稿された日記はリアルタイムで展示会場に反映されます。
![image (4)](https://user-images.githubusercontent.com/77391181/194599523-6c4dd8e3-5d61-4112-8531-4bb9de5b841b.png)
<br><br>

# 使用技術
- Laravel9
- React / Inertia.js
- SwitchBot API
<br>
<br>

# 機能一覧
- ユーザー情報
    1. ユーザー登録
    2. ログイン／ログアウト
    ![image](https://user-images.githubusercontent.com/77391181/194601481-78632f73-3baf-4935-afcf-442ecb361672.png)
- 日記表示／投稿
    1. 架空日記一覧表示
    2. 架空日記ランダム表示
    Reactを利用して、ページをパラパラめくるUIを実装しました。
    ![image (6)](https://user-images.githubusercontent.com/77391181/194601617-b5f11c27-79af-43a6-8bf0-0c00a5695155.png)
    3. ユーザーによる日記投稿
    <br>記入フォームまたは手書きの画像から日記を投稿できます。
    ![image (7)](https://user-images.githubusercontent.com/77391181/194601765-4176f65d-c5a9-4dfd-a74e-e9a2d2430cee.png)
    ![IMG_1171](https://user-images.githubusercontent.com/77391181/194601901-5d54db0a-c8c9-4a45-8dd9-b90bc7371ad6.JPG)
    4. 投稿内容の画像合成
    <br>フォームから入力された文字はランダムなフォントでテンプレート画像に合成されます。
    ![image (8)](https://user-images.githubusercontent.com/77391181/194602033-2ef1ac8d-d5bb-4a8e-84ce-efc4b3a07b4f.png)
    5. 管理者による投稿削除
- 展示組込
    1. 投稿時の画面変化
    <br>Pusherを利用して、投稿時に会場ディスプレイに映っている架空日記のページが自動で開くようにしました。
    2. 投稿時の照明変化
    <br>SwitcBot APIを利用して、投稿時に会場照明が点灯するようにしました。
    ![IMG_2807](https://user-images.githubusercontent.com/77391181/194602357-772cf848-6ee7-41bc-96ff-e927859c768f.jpg)

<br>
デモ動画はこちら
<br>
URL ： https://youtu.be/jwzaXWewz2k
