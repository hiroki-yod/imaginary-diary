import React, { useRef, useState, useEffect } from "react"
import { Link, Head, useForm } from '@inertiajs/inertia-react';
import './css/main.css';
import styled from 'styled-components';

const WhiteStyle = styled.div`
        background-color: white;
        width: 500px;
    `;

export default React.forwardRef(function CreateForm(props, ref) {
    const { data, setData, post, errors, processing } = useForm({
        title: "",
        body: "",
        year:'',
        date: "",
    });

    function onSubmit(e) {  //submit関数。
        e.preventDefault();
        post("/diary");
    }

    return (
        <WhiteStyle ref={ref}>
            <p>松本家架空日記</p>
            <form
                onSubmit={onSubmit}
                className="pt-6 pb-8 mb-4 flex flex-col gap-4"
            >
                <div>
                    <label
                        htmlFor="title"
                        className="block text-gray-700 text-sm font-bold mb-2"
                    >
                        タイトル
                    </label>
                    <input
                        id="title"
                        type="text"
                        className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        value={data.title}
                        placeholder="例：イナズマロックフェス"
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
                </div>
                <div>
                    <input type="text" className="" value={data.year} onChange={(e) => {setData("year", e.target.value);}}/>
                    {errors.year && (<div className="text-red-600">{errors.year}</div>)}
                </div>
                <div>
                    <input type="date" className="" value={data.date} onChange={(e) => {setData("date", e.target.value);}}/>
                    {errors.date && (<div className="text-red-600">{errors.date}</div>)}
                </div>
                <div>
                    <label
                        htmlFor="description"
                        className="block text-gray-700 text-sm font-bold mb-2"
                    >
                        イベントについて
                    </label>
                    <textarea
                        id="description"
                        className='note'
                        value={data.body}
                        onChange={(e) => {
                            setData("body", e.target.value);
                        }}
                    >

                    </textarea>
                    {errors.body && (
                        <div className="text-red-600">
                            {errors.body}
                        </div>
                    )}
                </div>

                <div className="flex justify-end pr-2">
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
