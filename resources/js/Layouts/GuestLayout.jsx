import React, { useRef, useState, useEffect } from "react"
import { Link, Head, useForm } from '@inertiajs/inertia-react';
import '../Pages/css/main.css';
import styled from 'styled-components';
import { useMedia } from "react-use";

export default function Guest({ children }) {
    return (
            <div className="w-full sm:max-w-md mt-20 mx-auto px-4 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {children}
            </div>
    );
}
