import React, { useRef, useState, useEffect } from "react"
import { Link, Head, useForm } from '@inertiajs/inertia-react';
import './css/main.css';
import CreateForm from './CreateForm';
import styled from 'styled-components';

export default function Create(props) {
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


    return (
        <WhiteStyle>
            <CreateForm/>
            <CreateForm/>
        </WhiteStyle>
    );
};
