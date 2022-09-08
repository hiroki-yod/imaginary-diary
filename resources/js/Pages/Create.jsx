import React, { useRef, useState, useEffect } from "react"
import { Link, Head, useForm } from '@inertiajs/inertia-react';
import './css/main.css';
import CreateForm from './CreateForm';
import styled from 'styled-components';

const WhiteStyle = styled.div`
        background-color: white;
        width: 1000px;
        height: 700px;
        margin-top:50px;
        margin-left:20%;
        display: flex;
    `;

export default function Create(props) {

    return (
        <WhiteStyle>
            <CreateForm/>
            <CreateForm/>
        </WhiteStyle>
    );
};
