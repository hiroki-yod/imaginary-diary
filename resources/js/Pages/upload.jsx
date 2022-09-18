import React, { useRef, useState, useEffect } from "react"
import { Link, Head, useForm } from '@inertiajs/inertia-react';
import './css/main.css';
import UploadForm from './UploadForm';
import SpUploadForm from './SpUploadForm';
import styled from 'styled-components';
import { useMedia } from "react-use";

export default function Create(props) {
    const isWide = useMedia("(min-width: 440px)"); // useMediaの指定の仕方を修正

    //画面がロードされた時に行う処理
    useEffect(() => {
        const onResize = () => {
            setWindowDimensions(getWindowDimensions());
        }

        window.addEventListener('resize', onResize);
        return () => window.removeEventListener('resize', onResize);
    }, []);

    //画面の幅と高さを取得するやつ
    const getWindowDimensions = () => {
        const { innerWidth: width, innerHeight: height } = window;
        return {
            width,
            height
        };
    }

    const [windowDimensions, setWindowDimensions] = useState(getWindowDimensions()); //高さと横幅をstateに入れる

    const WhiteStyle = styled.div`
        background-color: white;
        width: ${windowDimensions.width * 0.66}px;
        height: ${windowDimensions.height * 0.94}px;
        margin: 3vh 17vw 0vh 17vw;
        display: flex;
    `;

    const SpWhiteStyle = styled.div`
        background-color: white;
        width: ${windowDimensions.width * 0.9}px;
        height: ${windowDimensions.height * 0.9}px;
        margin: 5vh auto 0;
        display: flex;
    `;

    const pc = (
        <WhiteStyle>
            <UploadForm/>
            <UploadForm/>
        </WhiteStyle>
    );

    const smartphone = (
        <SpWhiteStyle>
            <SpUploadForm/>
        </SpWhiteStyle>
    );

    return <>
        {isWide? pc:smartphone}
    </> ;
};
