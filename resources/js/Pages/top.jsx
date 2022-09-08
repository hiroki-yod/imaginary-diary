import React, { useRef, useState, useEffect } from "react"
import { Link, Head, useForm } from '@inertiajs/inertia-react';
import './css/main.css';
import Book2 from './css//image/IMG_4376.jpg';
import Poster from './css//image/poster.png';
import HTMLFlipBook from 'react-pageflip';
import styled from 'styled-components';
import Create from './CreateForm';
import { Inertia } from '@inertiajs/inertia'



export default function Top(props) {
    const getWindowDimensions = () => {
        const { innerWidth: width, innerHeight: height } = window;
        return {
            width,
            height
        };
    }
    const [windowDimensions, setWindowDimensions] = useState(getWindowDimensions());
    useEffect(() => {
        arryDivide(dummyArr, 10);
        Echo.channel('chat').listen('DiaryWrited', e => {
            flipMany(tenDividedDiaries.length + props.diaries.length + 3);
        });

        const onResize = () => {
            setWindowDimensions(getWindowDimensions());
        }

        window.addEventListener('resize', onResize);
        return () => window.removeEventListener('resize', onResize);
    }, []);

    const ImgStyle = styled.img`
        width: ${windowDimensions.width * 0.8 * 0.5}px;
        height:${windowDimensions.height * 0.9}px;
    `;

    const BookStyle = styled.h1`
        margin-top:50px;
        margin-left:10%;
        margin-right:10%;
    `;

    const WhiteStyle = styled.div`
        background-color: white;
    `;

    const [tenDividedDiaries, setTenDividedDiaries] = useState([]); //渡されたデータを分割したデータ
    const dummyArr = [].concat(props.diaries);
    function arryDivide(arr, num) {  //配列を分割してtenDivideDiariesに代入していく
        let tmpArr;
        let tmpDivide = [];
        while (arr.length > 0) {
            tmpArr = arr.splice(0, num);
            tmpDivide.push(tmpArr);
        }
        setTenDividedDiaries(tmpDivide);
    }

    const [flipSpeed, setFlipSpeed] = useState(props.pageNumber? 200:500); //flipをめくる速度をstateで管理しようと思ったけどできなかった。


    const  book  =  useRef () ;  //本のページをめくるのに必要

    function flip (n) {
        book.current.pageFlip().flip(n)
    }

    const sleep = waitTime => new Promise( resolve => setTimeout(resolve, waitTime) );  //引数に入力した数字だけ動作を停止

    async function flipMany(n, speed=1000)  {
        setFlipSpeed(200);  //速度200をセットしてるけど何も変わらず...
        for (let i of [...Array(Number(n))]) {
            book.current.pageFlip().flipNext(); //次のフリップへ（アニメーション付き）
            await sleep(speed); //デフォルトなら
        }
    }

    function FadeInLinkClick() {
        const frame = document.getElementById("fadeLayer");
        frame.className = "FadeInFrame fadein";
        frame.style.visibility = "visible";
        frame.addEventListener('transitionend', () => {
            FadeOut();
        })
    }

    function FadeOut() {
        const frame = document.getElementById("fadeLayer");
        frame.className = "FadeInFrame";
        frame.style.visibility = "hidden";
    }

    return (
        <div className='content'>
            <div className="paper">
                <div id="fadeLayer" className="FadeInFrame"></div>
                <h2>松本家架空日記とは</h2>
                <p>現在の私たちが松本家の歴史に参加し続きの物語を紡ぐことができるように『松本家架空日記』を用意しました。
                    架空の日記を書くことを通じてみなさんは歴史の隠れた1ページあるいはこれから先の1ページに参加することができます。
                    登場人物はあなたでもあなたではない誰かでも構いません。
                    ある縄文時代から遥か未来までのどこか1日を選んで松本家で起こるかもしれないある日の物語を書いてください。
                    このWebページから架空日記を投稿することができ、日記はリアルタイムで展示会場に反映されます。</p>
                <p>
                    PCの方は表紙にカーソルを合わせると、タブレットの方は表紙をタップすると、『松本家架空日記』が開きます。
                </p>
            </div>
            <BookStyle>
                <HTMLFlipBook
                    width={windowDimensions.width * 0.8 * 0.5}
                    height={windowDimensions.height * 0.9}
                    showCover={true}
                    drawShadow={true}
                    ref={book}
                    flippingTime={flipSpeed}
                    onInit={()=> {
                        if(props.pageNumber){
                            flipMany(Math.trunc((Number(props.pageNumber) + 3 + Number(tenDividedDiaries.length))/2), 180);
                        }
                    }}
                >
                    <div className="demoPage"><ImgStyle src={Poster}/></div>
                    <div className="demoPage"><ImgStyle src={Poster}/></div>
                    <WhiteStyle>
                        <button onClick={() => flip(2)}>
                            <div className="menu">
                                <h1>一覧を見る</h1>
                            </div>
                        </button>
                        <a href='/diary/random'>
                            <div className="menu">
                                <h1>日記を開く</h1>
                            </div>
                        </a>
                        <button onClick={async() => {
                            flip(13);
                            await sleep(2000);
                            Inertia.get('/diary/create')
                        }}>
                            <div className="menu">
                                <h1>日記を書く</h1>
                            </div>
                        </button>
                        <button type="button" onClick={FadeInLinkClick}>暗転テスト</button>
                        <Link href={ route('register')}>ユーザー登録</Link>
                    </WhiteStyle>
                    {tenDividedDiaries.map((diaries, index) => (
                        <WhiteStyle>
                            {diaries.map((diary, i) => (
                                <div>
                                    <button onClick={() => {flip(index*10 + 3 + tenDividedDiaries.length + i)}}>{diary.title}</button>
                                    <button>{index*10 + 3 + tenDividedDiaries.length + i}</button>
                                </div>
                            ))}
                        </WhiteStyle>
                    ))}

                    {props.diaries.map((diary, index)=> (
                        <WhiteStyle className="demoPage">
                            <ImgStyle src={diary.image_path}/>
                            <p>{index}</p>
                        </WhiteStyle>
                    ))}
                    <div className="demoPage"><ImgStyle src={Book2}></ImgStyle></div>
                    <div className="demoPage"><ImgStyle src={Book2}></ImgStyle></div>
                    <Create/>
                    <Create/>
                    <Create/>
                    <Create/>
                </HTMLFlipBook>
            </BookStyle>
            <button onClick={()=> {flip(2)}}>目次</button>
        </div>
    );
}
