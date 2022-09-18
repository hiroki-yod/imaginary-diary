import React, { useRef, useState, useEffect } from "react"
import { Link, Head, useForm } from '@inertiajs/inertia-react';
import './css/main.css';
import styled from 'styled-components';

const WhiteStyle = styled.div`
        background-color: white;
        width: 100%;
    `;

const DateStyle = styled.input`
        border-bottom:none;
        border-right:none;
        border-left:none;
        border-top:none;
        font-size: 0.75rem;
        width: 100%;
    `;

const DateWrapper = styled.div`
        display: flex;
        font-size: 0.75rem;
        border-bottom:1px solid #cccccc;
        border-right:none;
        border-left:none;
        border-top:none;
        width:50%;
        margin-left:auto;
        margin-right:10%;
    `;

const TitleStyle = styled.input`
    border-bottom:1px solid #cccccc;
    border-right:none;
    border-left:none;
    border-top:none;
    `;

const TitleWrapper = styled.div`
        margin-right: auto;
        margin-left: auto;
        width:60%;
    `

const PStyle = styled.p`
        margin-top: auto;
    `

const TextStyle = styled.div`
        line-height: 30px;
        background: linear-gradient(to bottom, #cccccc 1px, white 1px);
        background-size: 100% 30px;
        background-origin: content-box;
        background-attachment: local;
        /* 枠線を消す */
        border: none;
        /* 右下の//(サイズ変更機能)を消す */
        resize: none;
        /* フォーカスした際の青い枠線を消す */
        outline: none;
        width: 100%;
        height: 100%;
    `

const TextWrapper = styled.div`
        width:85%;
        margin-top: 5vh;
        height:55vh;
        margin-left:auto;
        margin-right:auto;
    `

export default React.forwardRef(function CreateForm(props, ref) {
    const { data, setData, post, errors, processing } = useForm({
        title: "",
        image_path: "",
        year:'',
        month: "",
        day: "",
    });

    const [preImage, setPreImage] = useState('');

    function onSubmit(e) {  //submit関数。
        e.preventDefault();
        post("/upload");
    }

    return (
        <WhiteStyle ref={ref}>
            <p class="form-title">松本家架空日記</p>
            <form
                onSubmit={onSubmit}
            >
                <DateWrapper>
                    <DateStyle type="number" value={data.year} onChange={(e) => {setData("year", e.target.value);}}/>
                    <PStyle>年</PStyle>
                    {errors.year && (<div className="text-red-600">{errors.year}</div>)}
                    <DateStyle type="number" min="1" max="12" value={data.month} onChange={(e) => {setData("month", e.target.value);}}/>
                    <PStyle>月</PStyle>
                    <DateStyle type="number" min="1"value={data.day} onChange={(e) => {setData("day", e.target.value);}}/>
                    {/* maxを設定するとレイアウトがずれる */}
                    <PStyle>日</PStyle>
                    {errors.month && (<div className="text-red-600">{errors.date}</div>)}
                </DateWrapper>
                <TitleWrapper>
                    <TitleStyle
                        id="title"
                        type="text"
                        value={data.title}
                        placeholder="タイトル"
                        maxLength="15"
                        onChange={(e) =>
                            setData("title", e.target.value)
                        }
                    />
                    {errors.title && (
                        <div className="text-red-600">
                            {errors.title}
                        </div>
                    )}
                </TitleWrapper>
                <TextWrapper>
                    <TextStyle>
                        {!preImage ? (<label className="flex items-center justify-center h-full bg-white border rounded border-black">
                                <input
                                    type="file"
                                    name="file"
                                    className="hidden"
                                    onChange={e => {
                                        setData('image_path', e.target.files[0]);
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            setPreImage(e.target.result);
                                        }
                                        reader.readAsDataURL(e.target.files[0]);
                                    }}
                                />
                                画像を選択する
                            </label>):
                            (<div className="flex items-center justify-center h-full bg-white border rounded border-black mb-4 relative">
                                <svg onClick={() => {
                                    setPreImage(null);
                                }}
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="absolute left-full bottom-full w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <img className='h-full' src={preImage}/>
                            </div>)}
                        {errors.images && <div className='text-red-600'>{errors.images}</div>}
                    </TextStyle>
                    {errors.body && (
                        <div className="text-red-600">
                            {errors.body}
                        </div>
                    )}
                </TextWrapper>

                <div className="flex justify-end pr-2">
                    <Link
                        href="/diary/create"
                        className="flex justify-center items-center postButton w-1/4 h-10 text-xs text-black font-bold rounded border border-black focus:outline-none focus:shadow-outline mr-2"
                    >
                        文字入力へ
                    </Link>
                    <button
                        onClick={onSubmit}
                        disabled={processing}
                        className="postButton w-1/4 h-10 text-xs text-black font-bold rounded border border-black focus:outline-none focus:shadow-outline"
                    >
                        投稿
                    </button>
                </div>
            </form>
        </WhiteStyle>
    );
});
