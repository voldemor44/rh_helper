<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="{{ config('app.name') }} ">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{--  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/line-awesome@1.3.1/dist/css/line-awesome.min.css">  --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css"
    integrity="sha512-vebUliqxrVkBy3gucMhClmyQP9On/HAWQdKDXRaAlb/FKuTbxkjPKUyqVOxAcGwFDka79eTF+YXwfke1h3/wfg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material.css') }}">

    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="main-wrapper">

        @include('partials.header')




        <div class="mt-5"></div>
        <div class="mt-5"></div>


            {{--  <div class="chat-main-row">

                <div class="chat-main-wrapper">

                    <div class="col-lg-9 message-view task-view">
                        <div class="chat-window">
                            <div class="fixed-header">
                                <div class="navbar">
                                    <div class="user-details me-auto">
                                        <div class="float-start user-img">
                                            <a class="avatar" href="profile.html" title="Mike Litorus">
                                                <img src="assets/img/profiles/avatar-05.jpg" alt
                                                    class="rounded-circle">
                                                <span class="status online"></span>
                                            </a>
                                        </div>
                                        <div class="user-info float-start">
                                            <a href="profile.html" title="Mike Litorus"><span>Mike Litorus</span> <i
                                                    class="typing-text">Typing...</i></a>
                                            <span class="last-seen">Last seen today at 7:50 AM</span>
                                        </div>
                                    </div>
                                    <div class="search-box">
                                        <div class="input-group input-group-sm">
                                            <input type="text" placeholder="Search" class="form-control">
                                            <button type="button" class="btn"><i
                                                    class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                    <ul class="nav custom-menu">
                                        <li class="nav-item">
                                            <a class="nav-link task-chat profile-rightbar float-end" id="task_chat"
                                                href="#task_window"><i class="fa fa-user"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="voice-call.html" class="nav-link"><i
                                                    class="fa fa-phone"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="video-call.html" class="nav-link"><i
                                                    class="fa fa-video-camera"></i></a>
                                        </li>
                                        <li class="nav-item dropdown dropdown-action">
                                            <a aria-expanded="false" data-bs-toggle="dropdown"
                                                class="nav-link dropdown-toggle" href><i class="fa fa-cog"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="javascript:void(0)" class="dropdown-item">Delete
                                                    Conversations</a>
                                                <a href="javascript:void(0)" class="dropdown-item">Settings</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="chat-contents">
                                <div class="chat-content-wrap">
                                    <div class="chat-wrap-inner">
                                        <div class="chat-box">
                                            <div class="chats">
                                                <div class="chat chat-right">
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p>Hello. What can I do for you?</p>
                                                                <span class="chat-time">8:30 am</span>
                                                            </div>
                                                            <div class="chat-action-btns">
                                                                <ul>
                                                                    <li><a href="#" class="share-msg"
                                                                            title="Share"><i
                                                                                class="fa fa-share-alt"></i></a></li>
                                                                    <li><a href="#" class="edit-msg"><i
                                                                                class="fa fa-pencil"></i></a></li>
                                                                    <li><a href="#" class="del-msg"><i
                                                                                class="fa fa-trash-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-line">
                                                    <span class="chat-date">October 8th, 2018</span>
                                                </div>
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img alt src="assets/img/profiles/avatar-05.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p>I m just looking around.</p>
                                                                <p>Will you tell me something about yourself? </p>
                                                                <span class="chat-time">8:35 am</span>
                                                            </div>
                                                            <div class="chat-action-btns">
                                                                <ul>
                                                                    <li><a href="#" class="share-msg"
                                                                            title="Share"><i
                                                                                class="fa fa-share-alt"></i></a></li>
                                                                    <li><a href="#" class="edit-msg"><i
                                                                                class="fa fa-pencil"></i></a></li>
                                                                    <li><a href="#" class="del-msg"><i
                                                                                class="fa fa-trash-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p>Are you there? That time!</p>
                                                                <span class="chat-time">8:40 am</span>
                                                            </div>
                                                            <div class="chat-action-btns">
                                                                <ul>
                                                                    <li><a href="#" class="share-msg"
                                                                            title="Share"><i
                                                                                class="fa fa-share-alt"></i></a></li>
                                                                    <li><a href="#" class="edit-msg"><i
                                                                                class="fa fa-pencil"></i></a></li>
                                                                    <li><a href="#" class="del-msg"><i
                                                                                class="fa fa-trash-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat chat-right">
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p>Where?</p>
                                                                <span class="chat-time">8:35 am</span>
                                                            </div>
                                                            <div class="chat-action-btns">
                                                                <ul>
                                                                    <li><a href="#" class="share-msg"
                                                                            title="Share"><i
                                                                                class="fa fa-share-alt"></i></a></li>
                                                                    <li><a href="#" class="edit-msg"><i
                                                                                class="fa fa-pencil"></i></a></li>
                                                                    <li><a href="#" class="del-msg"><i
                                                                                class="fa fa-trash-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p>OK, my name is Limingqiang. I like singing, playing
                                                                    basketballand so on.</p>
                                                                <span class="chat-time">8:42 am</span>
                                                            </div>
                                                            <div class="chat-action-btns">
                                                                <ul>
                                                                    <li><a href="#" class="share-msg"
                                                                            title="Share"><i
                                                                                class="fa fa-share-alt"></i></a></li>
                                                                    <li><a href="#" class="edit-msg"><i
                                                                                class="fa fa-pencil"></i></a></li>
                                                                    <li><a href="#" class="del-msg"><i
                                                                                class="fa fa-trash-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img alt src="assets/img/profiles/avatar-05.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p>You wait for notice.</p>
                                                                <span class="chat-time">8:30 am</span>
                                                            </div>
                                                            <div class="chat-action-btns">
                                                                <ul>
                                                                    <li><a href="#" class="share-msg"
                                                                            title="Share"><i
                                                                                class="fa fa-share-alt"></i></a></li>
                                                                    <li><a href="#" class="edit-msg"><i
                                                                                class="fa fa-pencil"></i></a></li>
                                                                    <li><a href="#" class="del-msg"><i
                                                                                class="fa fa-trash-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p>Consectetuorem ipsum dolor sit?</p>
                                                                <span class="chat-time">8:50 am</span>
                                                            </div>
                                                            <div class="chat-action-btns">
                                                                <ul>
                                                                    <li><a href="#" class="share-msg"
                                                                            title="Share"><i
                                                                                class="fa fa-share-alt"></i></a></li>
                                                                    <li><a href="#" class="edit-msg"><i
                                                                                class="fa fa-pencil"></i></a></li>
                                                                    <li><a href="#" class="del-msg"><i
                                                                                class="fa fa-trash-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p>OK?</p>
                                                                <span class="chat-time">8:55 am</span>
                                                            </div>
                                                            <div class="chat-action-btns">
                                                                <ul>
                                                                    <li><a href="#" class="share-msg"
                                                                            title="Share"><i
                                                                                class="fa fa-share-alt"></i></a></li>
                                                                    <li><a href="#" class="edit-msg"><i
                                                                                class="fa fa-pencil"></i></a></li>
                                                                    <li><a href="#" class="del-msg"><i
                                                                                class="fa fa-trash-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="chat-bubble">
                                                            <div class="chat-content img-content">
                                                                <div class="chat-img-group clearfix">
                                                                    <p>Uploaded 3 Images</p>
                                                                    <a class="chat-img-attach" href="#">
                                                                        <img width="182" height="137" alt
                                                                            src="assets/img/placeholder.jpg">
                                                                        <div class="chat-placeholder">
                                                                            <div class="chat-img-name">placeholder.jpg
                                                                            </div>
                                                                            <div class="chat-file-desc">842 KB</div>
                                                                        </div>
                                                                    </a>
                                                                    <a class="chat-img-attach" href="#">
                                                                        <img width="182" height="137" alt
                                                                            src="assets/img/placeholder.jpg">
                                                                        <div class="chat-placeholder">
                                                                            <div class="chat-img-name">842 KB</div>
                                                                        </div>
                                                                    </a>
                                                                    <a class="chat-img-attach" href="#">
                                                                        <img width="182" height="137" alt
                                                                            src="assets/img/placeholder.jpg">
                                                                        <div class="chat-placeholder">
                                                                            <div class="chat-img-name">placeholder.jpg
                                                                            </div>
                                                                            <div class="chat-file-desc">842 KB</div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <span class="chat-time">9:00 am</span>
                                                            </div>
                                                            <div class="chat-action-btns">
                                                                <ul>
                                                                    <li><a href="#" class="share-msg"
                                                                            title="Share"><i
                                                                                class="fa fa-share-alt"></i></a></li>
                                                                    <li><a href="#" class="edit-msg"><i
                                                                                class="fa fa-pencil"></i></a></li>
                                                                    <li><a href="#" class="del-msg"><i
                                                                                class="fa fa-trash-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat chat-right">
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p>OK!</p>
                                                                <span class="chat-time">9:00 am</span>
                                                            </div>
                                                            <div class="chat-action-btns">
                                                                <ul>
                                                                    <li><a href="#" class="share-msg"
                                                                            title="Share"><i
                                                                                class="fa fa-share-alt"></i></a></li>
                                                                    <li><a href="#" class="edit-msg"><i
                                                                                class="fa fa-pencil"></i></a></li>
                                                                    <li><a href="#" class="del-msg"><i
                                                                                class="fa fa-trash-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img alt src="assets/img/profiles/avatar-05.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p>Uploaded 3 files</p>
                                                                <ul class="attach-list">
                                                                    <li><i class="fa fa-file"></i> <a
                                                                            href="#">example.avi</a></li>
                                                                    <li><i class="fa fa-file"></i> <a
                                                                            href="#">activity.psd</a></li>
                                                                    <li><i class="fa fa-file"></i> <a
                                                                            href="#">example.psd</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="chat-action-btns">
                                                                <ul>
                                                                    <li><a href="#" class="share-msg"
                                                                            title="Share"><i
                                                                                class="fa fa-share-alt"></i></a></li>
                                                                    <li><a href="#" class="edit-msg"><i
                                                                                class="fa fa-pencil"></i></a></li>
                                                                    <li><a href="#" class="del-msg"><i
                                                                                class="fa fa-trash-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p>Consectetuorem ipsum dolor sit?</p>
                                                                <span class="chat-time">8:50 am</span>
                                                            </div>
                                                            <div class="chat-action-btns">
                                                                <ul>
                                                                    <li><a href="#" class="share-msg"
                                                                            title="Share"><i
                                                                                class="fa fa-share-alt"></i></a></li>
                                                                    <li><a href="#" class="edit-msg"><i
                                                                                class="fa fa-pencil"></i></a></li>
                                                                    <li><a href="#" class="del-msg"><i
                                                                                class="fa fa-trash-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p>OK?</p>
                                                                <span class="chat-time">8:55 am</span>
                                                            </div>
                                                            <div class="chat-action-btns">
                                                                <ul>
                                                                    <li><a href="#" class="share-msg"
                                                                            title="Share"><i
                                                                                class="fa fa-share-alt"></i></a></li>
                                                                    <li><a href="#" class="edit-msg"><i
                                                                                class="fa fa-pencil"></i></a></li>
                                                                    <li><a href="#" class="del-msg"><i
                                                                                class="fa fa-trash-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat chat-right">
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content img-content">
                                                                <div class="chat-img-group clearfix">
                                                                    <p>Uploaded 6 Images</p>
                                                                    <a class="chat-img-attach" href="#">
                                                                        <img width="182" height="137" alt
                                                                            src="assets/img/placeholder.jpg">
                                                                        <div class="chat-placeholder">
                                                                            <div class="chat-img-name">placeholder.jpg
                                                                            </div>
                                                                            <div class="chat-file-desc">842 KB</div>
                                                                        </div>
                                                                    </a>
                                                                    <a class="chat-img-attach" href="#">
                                                                        <img width="182" height="137" alt
                                                                            src="assets/img/placeholder.jpg">
                                                                        <div class="chat-placeholder">
                                                                            <div class="chat-img-name">842 KB</div>
                                                                        </div>
                                                                    </a>
                                                                    <a class="chat-img-attach" href="#">
                                                                        <img width="182" height="137" alt
                                                                            src="assets/img/placeholder.jpg">
                                                                        <div class="chat-placeholder">
                                                                            <div class="chat-img-name">placeholder.jpg
                                                                            </div>
                                                                            <div class="chat-file-desc">842 KB</div>
                                                                        </div>
                                                                    </a>
                                                                    <a class="chat-img-attach" href="#">
                                                                        <img width="182" height="137" alt
                                                                            src="assets/img/placeholder.jpg">
                                                                        <div class="chat-placeholder">
                                                                            <div class="chat-img-name">placeholder.jpg
                                                                            </div>
                                                                            <div class="chat-file-desc">842 KB</div>
                                                                        </div>
                                                                    </a>
                                                                    <a class="chat-img-attach" href="#">
                                                                        <img width="182" height="137" alt
                                                                            src="assets/img/placeholder.jpg">
                                                                        <div class="chat-placeholder">
                                                                            <div class="chat-img-name">placeholder.jpg
                                                                            </div>
                                                                            <div class="chat-file-desc">842 KB</div>
                                                                        </div>
                                                                    </a>
                                                                    <a class="chat-img-attach" href="#">
                                                                        <img width="182" height="137" alt
                                                                            src="assets/img/placeholder.jpg">
                                                                        <div class="chat-placeholder">
                                                                            <div class="chat-img-name">placeholder.jpg
                                                                            </div>
                                                                            <div class="chat-file-desc">842 KB</div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <span class="chat-time">9:00 am</span>
                                                            </div>
                                                            <div class="chat-action-btns">
                                                                <ul>
                                                                    <li><a href="#" class="share-msg"
                                                                            title="Share"><i
                                                                                class="fa fa-share-alt"></i></a></li>
                                                                    <li><a href="#" class="edit-msg"><i
                                                                                class="fa fa-pencil"></i></a></li>
                                                                    <li><a href="#" class="del-msg"><i
                                                                                class="fa fa-trash-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img alt src="assets/img/profiles/avatar-05.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <ul class="attach-list">
                                                                    <li class="pdf-file"><i
                                                                            class="fa fa-file-pdf-o"></i> <a
                                                                            href="#">Document_2016.pdf</a></li>
                                                                </ul>
                                                                <span class="chat-time">9:00 am</span>
                                                            </div>
                                                            <div class="chat-action-btns">
                                                                <ul>
                                                                    <li><a href="#" class="share-msg"
                                                                            title="Share"><i
                                                                                class="fa fa-share-alt"></i></a></li>
                                                                    <li><a href="#" class="edit-msg"><i
                                                                                class="fa fa-pencil"></i></a></li>
                                                                    <li><a href="#" class="del-msg"><i
                                                                                class="fa fa-trash-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat chat-right">
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <ul class="attach-list">
                                                                    <li class="pdf-file"><i
                                                                            class="fa fa-file-pdf-o"></i> <a
                                                                            href="#">Document_2016.pdf</a></li>
                                                                </ul>
                                                                <span class="chat-time">9:00 am</span>
                                                            </div>
                                                            <div class="chat-action-btns">
                                                                <ul>
                                                                    <li><a href="#" class="share-msg"
                                                                            title="Share"><i
                                                                                class="fa fa-share-alt"></i></a></li>
                                                                    <li><a href="#" class="edit-msg"><i
                                                                                class="fa fa-pencil"></i></a></li>
                                                                    <li><a href="#" class="del-msg"><i
                                                                                class="fa fa-trash-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img alt src="assets/img/profiles/avatar-05.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <p>Typing ...</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-footer">
                                <div class="message-bar">
                                    <div class="message-inner">
                                        <a class="link attach-icon" href="#" data-bs-toggle="modal"
                                            data-bs-target="#drag_files"><img src="assets/img/attachment.png"
                                                alt></a>
                                        <div class="message-area">
                                            <div class="input-group">
                                                <textarea class="form-control" placeholder="Type message..."></textarea>
                                                <button class="btn btn-custom" type="button"><i
                                                        class="fa fa-send"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 message-view chat-profile-view chat-sidebar" id="task_window">
                        <div class="chat-window video-window">
                            <div class="fixed-header">
                                <ul class="nav nav-tabs nav-tabs-bottom">
                                    <li class="nav-item"><a class="nav-link" href="#calls_tab"
                                            data-bs-toggle="tab">Calls</a></li>
                                    <li class="nav-item"><a class="nav-link active" href="#profile_tab"
                                            data-bs-toggle="tab">Profile</a></li>
                                </ul>
                            </div>
                            <div class="tab-content chat-contents">
                                <div class="content-full tab-pane" id="calls_tab">
                                    <div class="chat-wrap-inner">
                                        <div class="chat-box">
                                            <div class="chats">
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img alt src="assets/img/profiles/avatar-02.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <span class="task-chat-user">You</span> <span
                                                                    class="chat-time">8:35 am</span>
                                                                <div class="call-details">
                                                                    <i class="material-icons">phone_missed</i>
                                                                    <div class="call-info">
                                                                        <div class="call-user-details">
                                                                            <span class="call-description">Jeffrey
                                                                                Warden missed the call</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img alt src="assets/img/profiles/avatar-02.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <span class="task-chat-user">John Doe</span> <span
                                                                    class="chat-time">8:35 am</span>
                                                                <div class="call-details">
                                                                    <i class="material-icons">call_end</i>
                                                                    <div class="call-info">
                                                                        <div class="call-user-details"><span
                                                                                class="call-description">This call has
                                                                                ended</span></div>
                                                                        <div class="call-timing">Duration: <strong>5
                                                                                min 57 sec</strong></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-line">
                                                    <span class="chat-date">January 29th, 2019</span>
                                                </div>
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img alt src="assets/img/profiles/avatar-05.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <span class="task-chat-user">Richard Miles</span>
                                                                <span class="chat-time">8:35 am</span>
                                                                <div class="call-details">
                                                                    <i class="material-icons">phone_missed</i>
                                                                    <div class="call-info">
                                                                        <div class="call-user-details">
                                                                            <span class="call-description">You missed
                                                                                the call</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img alt src="assets/img/profiles/avatar-02.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <span class="task-chat-user">You</span> <span
                                                                    class="chat-time">8:35 am</span>
                                                                <div class="call-details">
                                                                    <i class="material-icons">ring_volume</i>
                                                                    <div class="call-info">
                                                                        <div class="call-user-details">
                                                                            <a href="#"
                                                                                class="call-description call-description--linked"
                                                                                data-qa="call_attachment_link">Calling
                                                                                John Smith ...</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-full tab-pane show active" id="profile_tab">
                                    <div class="display-table">
                                        <div class="table-row">
                                            <div class="table-body">
                                                <div class="table-content">
                                                    <div class="chat-profile-img">
                                                        <div class="edit-profile-img">
                                                            <img src="assets/img/profiles/avatar-02.jpg" alt>
                                                            <span class="change-img">Change Image</span>
                                                        </div>
                                                        <h3 class="user-name m-t-10 mb-0">John Doe</h3>
                                                        <small class="text-muted">Web Designer</small>
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-primary edit-btn"><i
                                                                class="fa fa-pencil"></i></a>
                                                    </div>
                                                    <div class="chat-profile-info">
                                                        <ul class="user-det-list">
                                                            <li>
                                                                <span>Username:</span>
                                                                <span class="float-end text-muted">johndoe</span>
                                                            </li>
                                                            <li>
                                                                <span>DOB:</span>
                                                                <span class="float-end text-muted">24 July</span>
                                                            </li>
                                                            <li>
                                                                <span>Email:</span>
                                                                <span class="float-end text-muted"><a
                                                                        href="/cdn-cgi/l/email-protection"
                                                                        class="__cf_email__"
                                                                        data-cfemail="85efeaedebe1eae0c5e0fde4e8f5e9e0abe6eae8">[email&#160;protected]</a></span>
                                                            </li>
                                                            <li>
                                                                <span>Phone:</span>
                                                                <span class="float-end text-muted">9876543210</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="transfer-files">
                                                        <ul class="nav nav-tabs nav-tabs-solid nav-justified mb-0">
                                                            <li class="nav-item"><a class="nav-link active"
                                                                    href="#all_files" data-bs-toggle="tab">All
                                                                    Files</a></li>
                                                            <li class="nav-item"><a class="nav-link"
                                                                    href="#my_files" data-bs-toggle="tab">My
                                                                    Files</a></li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane show active" id="all_files">
                                                                <ul class="files-list">
                                                                    <li>
                                                                        <div class="files-cont">
                                                                            <div class="file-type">
                                                                                <span class="files-icon"><i
                                                                                        class="fa fa-file-pdf-o"></i></span>
                                                                            </div>
                                                                            <div class="files-info">
                                                                                <span
                                                                                    class="file-name text-ellipsis">AHA
                                                                                    Selfcare Mobile Application
                                                                                    Test-Cases.xls</span>
                                                                                <span class="file-author"><a
                                                                                        href="#">Loren
                                                                                        Gatlin</a></span> <span
                                                                                    class="file-date">May 31st at 6:53
                                                                                    PM</span>
                                                                            </div>
                                                                            <ul class="files-action">
                                                                                <li class="dropdown dropdown-action">
                                                                                    <a href class="dropdown-toggle"
                                                                                        data-bs-toggle="dropdown"
                                                                                        aria-expanded="false"><i
                                                                                            class="material-icons">more_horiz</i></a>
                                                                                    <div class="dropdown-menu">
                                                                                        <a class="dropdown-item"
                                                                                            href="javascript:void(0)">Download</a>
                                                                                        <a class="dropdown-item"
                                                                                            href="#"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#share_files">Share</a>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="tab-pane" id="my_files">
                                                                <ul class="files-list">
                                                                    <li>
                                                                        <div class="files-cont">
                                                                            <div class="file-type">
                                                                                <span class="files-icon"><i
                                                                                        class="fa fa-file-pdf-o"></i></span>
                                                                            </div>
                                                                            <div class="files-info">
                                                                                <span
                                                                                    class="file-name text-ellipsis">AHA
                                                                                    Selfcare Mobile Application
                                                                                    Test-Cases.xls</span>
                                                                                <span class="file-author"><a
                                                                                        href="#">John
                                                                                        Doe</a></span> <span
                                                                                    class="file-date">May 31st at 6:53
                                                                                    PM</span>
                                                                            </div>
                                                                            <ul class="files-action">
                                                                                <li class="dropdown dropdown-action">
                                                                                    <a href class="dropdown-toggle"
                                                                                        data-bs-toggle="dropdown"
                                                                                        aria-expanded="false"><i
                                                                                            class="material-icons">more_horiz</i></a>
                                                                                    <div class="dropdown-menu">
                                                                                        <a class="dropdown-item"
                                                                                            href="javascript:void(0)">Download</a>
                                                                                        <a class="dropdown-item"
                                                                                            href="#"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#share_files">Share</a>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>  --}}

            @include('Chatify::layouts.headLinks')
            <div class="messenger">
                {{-- ----------------------Users/Groups lists side---------------------- --}}
                <div class="messenger-listView {{ !!$id ? 'conversation-active' : '' }}">
                    {{-- Header and search bar --}}
                    <div class="m-header">
                        <nav>
                            <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">MESSAGES</span> </a>
                            {{-- header buttons --}}
                            <nav class="m-header-right">
                                <a href="#"><i class="fas fa-cog settings-btn"></i></a>
                                <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
                            </nav>
                        </nav>
                        {{-- Search input --}}
                        <input type="text" class="messenger-search" placeholder="Rechercher" />
                        {{-- Tabs --}}
                        {{-- <div class="messenger-listView-tabs">
                            <a href="#" class="active-tab" data-view="users">
                                <span class="far fa-user"></span> Contacts</a>
                        </div> --}}
                    </div>
                    {{-- tabs and lists --}}
                    <div class="m-body contacts-container">
                       {{-- Lists [Users/Group] --}}
                       {{-- ---------------- [ User Tab ] ---------------- --}}
                       <div class="show messenger-tab users-tab app-scroll" data-view="users">
                           {{-- Favorites --}}
                           <div class="favorites-section">
                            <p class="messenger-title"><span>Favoris</span></p>
                            <div class="messenger-favorites app-scroll-hidden"></div>
                           </div>
                           {{-- Saved Messages --}}
                           <p class="messenger-title"><span>Votre espace</span></p>
                           {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}
                           {{-- Contact --}}
                           <p class="messenger-title"><span>Tous les messages</span></p>
                           <div class="listOfContacts" style="width: 100%;height: calc(100% - 272px);position: relative;"></div>
                       </div>
                         {{-- ---------------- [ Search Tab ] ---------------- --}}
                       <div class="messenger-tab search-tab app-scroll" data-view="search">
                            {{-- items --}}
                            <p class="messenger-title"><span>Rechercher</span></p>
                            <div class="search-records">
                                <p class="message-hint center-el"><span>Tapez pour rechercher..</span></p>
                            </div>
                         </div>
                    </div>
                </div>

                {{-- ----------------------Messaging side---------------------- --}}
                <div class="messenger-messagingView">
                    {{-- header title [conversation name] amd buttons --}}
                    <div class="m-header m-header-messaging">
                        <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                            {{-- header back button, avatar and user name --}}
                            <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                                <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                                <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                                </div>
                                <a href="#" class="user-name">{{ config('app.name') }} - Messenger</a>
                            </div>
                            {{-- header buttons --}}
                            <nav class="m-header-right">
                                <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                                <a href="{{route('dashboard')}}"><i class="fas fa-home"></i></a>
                                <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                            </nav>
                        </nav>
                        {{-- Internet connection --}}
                        <div class="internet-connection">
                            <span class="ic-connected">Connecté</span>
                            <span class="ic-connecting">En attente de connexion..</span>
                            <span class="ic-noInternet">Pas d&apos;accès à internet</span>
                        </div>
                    </div>

                    {{-- Messaging area --}}
                    <div class="m-body messages-container app-scroll">
                        <div class="messages">
                            <p class="message-hint center-el"><span>Veuillez sélectionner un chat pour commencer à envoyer des messages</span></p>
                        </div>
                        {{-- Typing indicator --}}
                        <div class="typing-indicator">
                            <div class="message-card typing">
                                <div class="message">
                                    <span class="typing-dots">
                                        <span class="dot dot-1"></span>
                                        <span class="dot dot-2"></span>
                                        <span class="dot dot-3"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- Send Message Form --}}
                    @include('Chatify::layouts.sendForm')
                </div>
                {{-- ---------------------- Info side ---------------------- --}}
                <div class="messenger-infoView app-scroll">
                    {{-- nav actions --}}
                    <nav>
                        <p>Profil</p>
                        <a href="#"><i class="fas fa-times"></i></a>
                    </nav>
                    {!! view('Chatify::layouts.info')->render() !!}
                </div>
            </div>

            @include('Chatify::layouts.modals')
            @include('Chatify::layouts.footerLinks')

            {{--  <div id="drag_files" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Drag and drop files upload</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="js-upload-form">
                                <div class="upload-drop-zone" id="drop-zone">
                                    <i class="fa fa-cloud-upload fa-2x"></i> <span class="upload-text">Just drag and
                                        drop files here</span>
                                </div>
                                <h4>Uploading</h4>
                                <ul class="upload-list">
                                    <li class="file-list">
                                        <div class="upload-wrap">
                                            <div class="file-name">
                                                <i class="fa fa-photo"></i>
                                                photo.png
                                            </div>
                                            <div class="file-size">1.07 gb</div>
                                            <button type="button" class="file-close">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </div>
                                        <div class="progress progress-xs progress-striped">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: 65%"></div>
                                        </div>
                                        <div class="upload-process">37% done</div>
                                    </li>
                                    <li class="file-list">
                                        <div class="upload-wrap">
                                            <div class="file-name">
                                                <i class="fa fa-file"></i>
                                                task.doc
                                            </div>
                                            <div class="file-size">5.8 kb</div>
                                            <button type="button" class="file-close">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </div>
                                        <div class="progress progress-xs progress-striped">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: 65%"></div>
                                        </div>
                                        <div class="upload-process">37% done</div>
                                    </li>
                                    <li class="file-list">
                                        <div class="upload-wrap">
                                            <div class="file-name">
                                                <i class="fa fa-photo"></i>
                                                dashboard.png
                                            </div>
                                            <div class="file-size">2.1 mb</div>
                                            <button type="button" class="file-close">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </div>
                                        <div class="progress progress-xs progress-striped">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: 65%"></div>
                                        </div>
                                        <div class="upload-process">Completed</div>
                                    </li>
                                </ul>
                            </form>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="add_group" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Create a group</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Groups are where your team communicates. They’re best when organized around a topic —
                                #leads, for example.</p>
                            <form>
                                <div class="form-group">
                                    <label>Group Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Send invites to: <span class="text-muted-light">(optional)</span></label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div id="add_chat_user" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Direct Chat</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group m-b-30">
                                <input placeholder="Search to start a chat" class="form-control search-input"
                                    type="text">
                                <button class="btn btn-primary">Search</button>
                            </div>
                            <div>
                                <h5>Recent Conversations</h5>
                                <ul class="chat-user-list">
                                    <li>
                                        <a href="#">
                                            <div class="media d-flex">
                                                <span class="avatar align-self-center flex-shrink-0">
                                                    <img src="assets/img/profiles/avatar-16.jpg" alt>
                                                </span>
                                                <div class="media-body align-self-center text-nowrap flex-grow-1">
                                                    <div class="user-name">Jeffery Lalor</div>
                                                    <span class="designation">Team Leader</span>
                                                </div>
                                                <div class="text-nowrap align-self-center">
                                                    <div class="online-date">1 day ago</div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="media d-flex">
                                                <span class="avatar align-self-center flex-shrink-0">
                                                    <img src="assets/img/profiles/avatar-13.jpg" alt>
                                                </span>
                                                <div class="media-body align-self-center text-nowrap flex-grow-1">
                                                    <div class="user-name">Bernardo Galaviz</div>
                                                    <span class="designation">Web Developer</span>
                                                </div>
                                                <div class="align-self-center text-nowrap">
                                                    <div class="online-date">3 days ago</div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="media d-flex">
                                                <span class="avatar align-self-center flex-shrink-0">
                                                    <img src="assets/img/profiles/avatar-02.jpg" alt>
                                                </span>
                                                <div class="media-body text-nowrap align-self-center flex-grow-1">
                                                    <div class="user-name">John Doe</div>
                                                    <span class="designation">Web Designer</span>
                                                </div>
                                                <div class="align-self-center text-nowrap">
                                                    <div class="online-date">7 months ago</div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="share_files" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Share File</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="files-share-list">
                                <div class="files-cont">
                                    <div class="file-type">
                                        <span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
                                    </div>
                                    <div class="files-info">
                                        <span class="file-name text-ellipsis">AHA Selfcare Mobile Application
                                            Test-Cases.xls</span>
                                        <span class="file-author"><a href="#">Bernardo Galaviz</a></span>
                                        <span class="file-date">May 31st at 6:53 PM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Share With</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Share</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  --}}





    </div>

   @include('partials.settings-icon')

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('js/dropfiles.js') }}"></script>

    <script src="{{ asset('js/layout.js') }}"></script>
    <script src="{{ asset('js/theme-settings.js') }}"></script>
    <script src="{{ asset('js/greedynav.js') }}"></script>

    <script src="j{{ asset('js/app.js') }}"></script>
</body>

</html>
