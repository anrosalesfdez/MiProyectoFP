@extends('layouts.app')

@section('css')
<style>
/* Slider */
.slick-slider
{
    position: relative;

    display: block;
    box-sizing: border-box;

    -webkit-user-select: none;
       -moz-user-select: none;
        -ms-user-select: none;
            user-select: none;

    -webkit-touch-callout: none;
    -khtml-user-select: none;
    -ms-touch-action: pan-y;
        touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
}

.slick-list
{
    position: relative;

    display: block;
    overflow: hidden;

    margin: 0;
    padding: 0;
}
.slick-list:focus
{
    outline: none;
}
.slick-list.dragging
{
    cursor: pointer;
    cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list
{
    -webkit-transform: translate3d(0, 0, 0);
       -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
         -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
}

.slick-track
{
    position: relative;
    top: 0;
    left: 0;

    display: block;
    margin-left: auto;
    margin-right: auto;
}
.slick-track:before,
.slick-track:after
{
    display: table;

    content: '';
}
.slick-track:after
{
    clear: both;
}
.slick-loading .slick-track
{
    visibility: hidden;
}

.slick-slide
{
    display: none;
    float: left;

    height: 100%;
    min-height: 1px;
}
[dir='rtl'] .slick-slide
{
    float: right;
}
.slick-slide img
{
    display: block;
}
.slick-slide.slick-loading img
{
    display: none;
}
.slick-slide.dragging img
{
    pointer-events: none;
}
.slick-initialized .slick-slide
{
    display: block;
}
.slick-loading .slick-slide
{
    visibility: hidden;
}
.slick-vertical .slick-slide
{
    display: block;

    height: auto;

    border: 1px solid transparent;
}
.slick-arrow.slick-hidden {
    display: none;
}
@import url("https://fonts.googleapis.com/css?family=Poppins:200,200i,300,300i,400,400i,500,500i,600,600i,700,800&display=swap");
@import url("https://fonts.googleapis.com/css?family=Poppins:200,200i,300,300i,400,400i,500,500i,600,600i,700,800&display=swap");
/* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_extend.scss */


/* Normal desktop :1200px. */
/* Normal desktop :992px. */
/* Tablet desktop :768px. */
/* small mobile :320px. */
/* Large Mobile :480px. */
/* 1. Theme default css */
/* line 5, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
body {
  font-family: "Poppins", sans-serif;
  font-weight: normal;
  font-style: normal;
}

/* line 12, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.img {
  max-width: 100%;
  -webkit-transition: 0.3s;
  -moz-transition: 0.3s;
  -o-transition: 0.3s;
  transition: 0.3s;
}

/* line 16, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
a,
.button {
  -webkit-transition: 0.3s;
  -moz-transition: 0.3s;
  -o-transition: 0.3s;
  transition: 0.3s;
}

/* line 20, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
a:focus,
.button:focus, button:focus {
  text-decoration: none;
  outline: none;
}

/* line 25, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
a:focus {
  text-decoration: none;
}

/* line 28, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
a:focus,
a:hover,
.portfolio-cat a:hover,
.footer -menu li a:hover {
  text-decoration: none;
}

/* line 34, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
a,
button {
  color: #1F1F1F;
  outline: medium none;
}

/* line 39, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
h1, h2, h3, h4, h5 {
  font-family: "Poppins", sans-serif;
  color: #001D38;
}

/* line 43, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
h1 a,
h2 a,
h3 a,
h4 a,
h5 a,
h6 a {
  color: inherit;
}

/* line 52, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
ul {
  margin: 0px;
  padding: 0px;
}

/* line 56, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
li {
  list-style: none;
}

/* line 59, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
p {
  color: #727272;
  font-size: 15px;
  font-weight: 400;
  line-height: 28px;
  margin-bottom: 26px;
  margin-bottom: 13px;
  font-family: "Poppins", sans-serif;
}

/* line 69, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
label {
  color: #7e7e7e;
  cursor: pointer;
  font-size: 14px;
  font-weight: 400;
}

/* line 75, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
*::-moz-selection {
  background: #444;
  color: #fff;
  text-shadow: none;
}

/* line 80, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
::-moz-selection {
  background: #444;
  color: #fff;
  text-shadow: none;
}

/* line 85, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
::selection {
  background: #444;
  color: #fff;
  text-shadow: none;
}

/* line 90, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
*::-webkit-input-placeholder {
  color: #cccccc;
  font-size: 14px;
  opacity: 1;
}

/* line 95, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
*:-ms-input-placeholder {
  color: #cccccc;
  font-size: 14px;
  opacity: 1;
}

/* line 100, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
*::-ms-input-placeholder {
  color: #cccccc;
  font-size: 14px;
  opacity: 1;
}

/* line 105, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
*::placeholder {
  color: #cccccc;
  font-size: 14px;
  opacity: 1;
}

/* line 111, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
h3 {
  font-size: 24px;
}

/* line 115, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.mb-65 {
  margin-bottom: 67px;
}

/* line 119, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.black-bg {
  background: #020c26 !important;
}

/* line 123, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.white-bg {
  background: #ffffff;
}

/* line 126, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.gray-bg {
  background: #f5f5f5;
}

/* line 131, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.bg-img-1 {
  background-image: url(../img/slider/slider-img-1.jpg);
}

/* line 134, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.bg-img-2 {
  background-image: url(../img/background-img/bg-img-2.jpg);
}

/* line 137, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.cta-bg-1 {
  background-image: url(../img/background-img/bg-img-3.jpg);
}

/* line 142, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.overlay {
  position: relative;
  z-index: 0;
}

/* line 146, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.overlay::before {
  position: absolute;
  content: "";
  background-color: #1f1f1f;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
  opacity: .5;
}

/* line 158, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.overlay2 {
  position: relative;
  z-index: 0;
}

/* line 162, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.overlay2::before {
  position: absolute;
  content: "";
  background-color: #2C2C2C;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
  opacity: 0.6;
}

/* line 174, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.overlay_03 {
  position: relative;
  z-index: 0;
}

/* line 178, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.overlay_03::before {
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  background: #2C2C2C;
  opacity: .6;
  content: '';
  z-index: -1;
}

/* line 191, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.bradcam_overlay {
  position: relative;
  z-index: 0;
}

/* line 195, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.bradcam_overlay::before {
  position: absolute;
  content: "";
  /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#5db2ff+0,7db9e8+100&1+24,0+96 */
  background: -moz-linear-gradient(left, #5db2ff 0%, #65b4f9 24%, rgba(124, 185, 233, 0) 96%, rgba(125, 185, 232, 0) 100%);
  /* FF3.6-15 */
  background: -webkit-linear-gradient(left, #5db2ff 0%, #65b4f9 24%, rgba(124, 185, 233, 0) 96%, rgba(125, 185, 232, 0) 100%);
  /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(to right, #5db2ff 0%, #65b4f9 24%, rgba(124, 185, 233, 0) 96%, rgba(125, 185, 232, 0) 100%);
  /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#5db2ff', endColorstr='#007db9e8',GradientType=1 );
  /* IE6-9 */
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
  opacity: 1;
}

/* line 211, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.section-padding {
  padding-top: 120px;
  padding-bottom: 120px;
}

/* line 215, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.pt-120 {
  padding-top: 120px;
}

/* button style */
/* line 221, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.owl-carousel .owl-nav div {
  background: transparent;
  height: 50px;
  left: 0px;
  position: absolute;
  text-align: center;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  -webkit-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
  width: 50px;
  color: #fff;
  background-color: transparent;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  left: 50px;
  font-size: 15px;
  line-height: 50px;
  border: 1px solid #918DFE;
  left: 150px;
  color: #FFFFFF;
}

/* line 249, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.owl-carousel .owl-nav div.owl-next {
  left: auto;
  right: 150px;
}

/* line 254, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.owl-carousel .owl-nav div.owl-next i {
  position: relative;
  right: 0;
}

/* line 261, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.owl-carousel .owl-nav div.owl-prev i {
  position: relative;
  top: 0px;
}

/* line 271, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.owl-carousel:hover .owl-nav div {
  opacity: 1;
  visibility: visible;
}

/* line 274, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.owl-carousel:hover .owl-nav div:hover {
  color: #615CFD;
  background: #fff;
  border: 1px solid transparent;
}

/* line 284, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.mb-20px {
  margin-bottom: 20px;
}

/* line 288, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.mb-55 {
  margin-bottom: 55px;
}

/* line 291, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.mb-40 {
  margin-bottom: 40px;
}

/* line 294, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.mb-20 {
  margin-bottom: 20px;
}

/* line 297, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
.mb-95 {
  margin-bottom: 95px;
}

@media (max-width: 767px) {
  /* line 297, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
  .mb-95 {
    margin-bottom: 40px;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 297, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
  .mb-95 {
    margin-bottom: 50px;
  }
}

@media (min-width: 992px) and (max-width: 1200px) {
  /* line 297, ../../Arafath/CL/CL October/219. SEO/HTML/scss/theme-default.scss */
  .mb-95 {
    margin-bottom: 80px;
  }
}

/* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */




/* line 201, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
.line-button {
  color: #919191;
  font-size: 16px;
  font-weight: 400;
  display: inline-block;
  position: relative;
  padding-right: 5px;
  padding-bottom: 2px;
}

/* line 209, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
.line-button::before {
  position: absolute;
  content: "";
  background: #919191;
  width: 100%;
  height: 1px;
  bottom: 0;
  left: 0;
}

/* line 218, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
.line-button:hover {
  color: #009DFF;
}

/* line 221, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
.line-button:hover::before {
  background: #009DFF;
}

/* line 225, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
.line_btn {
  display: inline-block;
  font-size: 15px;
  color: #FF008C;
  border: 1px solid #FF008C;
  text-transform: capitalize;
  padding: 13px 34px;
  font-weight: 600;
}

/* line 233, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_btn.scss */
.line_btn:hover {
  background: #FF008C;
  color: #fff;
}

/* line 2, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_section_title.scss */
.section_title h3 {
  font-size: 40px;
  line-height: 52px;
  font-weight: 400;
  color: #001D38;
  position: relative;
  z-index: 0;
  margin-bottom: 10px;
}

@media (max-width: 767px) {
  /* line 2, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_section_title.scss */
  .section_title h3 {
    font-size: 30px;
    line-height: 36px;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 2, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_section_title.scss */
  .section_title h3 {
    font-size: 36px;
    line-height: 42px;
  }
}

@media (max-width: 767px) {
  /* line 19, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_section_title.scss */
  .section_title h3 br {
    display: none;
  }
}

/* line 25, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_section_title.scss */
.section_title p {
  font-size: 15px;
  color: #727272;
  line-height: 28px;
  margin-bottom: 0;
  font-weight: 400;
}

@media (max-width: 767px) {
  /* line 31, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_section_title.scss */
  .section_title p br {
    display: none;
  }
}

/* line 39, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_section_title.scss */
.section_title.white_text h3 {
  color: #fff;
}

/* line 42, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_section_title.scss */
.section_title.white_text span {
  color: #fff;
  padding-top: 0;
}

/* line 45, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_section_title.scss */
.section_title.white_text span:before {
  display: none;
}

/* line 49, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_section_title.scss */
.section_title.white_text p {
  color: #fff;
}

/* line 54, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_section_title.scss */
.mb-50 {
  margin-bottom: 50px;
}

@media (max-width: 767px) {
  /* line 54, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_section_title.scss */
  .mb-50 {
    margin-bottom: 40px;
  }
}

@media (max-width: 767px) {
  /* line 4, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slick-nav.scss */
  .mobile_menu {
    position: absolute;
    right: 0px;
    width: 100%;
    z-index: 9;
  }
}

/* line 13, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slick-nav.scss */
.slicknav_menu .slicknav_nav {
  background: #fff;
  float: right;
  margin-top: 0;
  padding: 0;
  width: 95%;
  padding: 0;
  border-radius: 0px;
  margin-top: 5px;
  position: absolute;
  left: 0;
  right: 0;
  margin: auto;
  top: 11px;
}

/* line 28, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slick-nav.scss */
.slicknav_menu .slicknav_nav a:hover {
  background: transparent;
  color: #ff008c;
}

/* line 32, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slick-nav.scss */
.slicknav_menu .slicknav_nav a.active {
  color: #ff008c;
}

@media (max-width: 767px) {
  /* line 35, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slick-nav.scss */
  .slicknav_menu .slicknav_nav a i {
    display: none;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 35, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slick-nav.scss */
  .slicknav_menu .slicknav_nav a i {
    display: none;
  }
}

/* line 44, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slick-nav.scss */
.slicknav_menu .slicknav_nav .slicknav_btn {
  background-color: transparent;
  cursor: pointer;
  margin-bottom: 10px;
  margin-top: -40px;
  position: relative;
  z-index: 99;
  border: 1px solid #ddd;
  top: 3px;
  right: 5px;
  top: -36px;
}

/* line 55, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slick-nav.scss */
.slicknav_menu .slicknav_nav .slicknav_btn .slicknav_icon {
  margin-right: 6px;
  margin-top: 3px;
  position: relative;
  padding-bottom: 3px;
  top: -11px;
  right: -5px;
}

@media (max-width: 767px) {
  /* line 12, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slick-nav.scss */
  .slicknav_menu {
    margin-right: 0px;
  }
}

/* line 72, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slick-nav.scss */
.slicknav_nav .slicknav_arrow {
  float: right;
  font-size: 22px;
  position: relative;
  top: -9px;
}

/* line 78, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slick-nav.scss */
.slicknav_btn {
  background-color: transparent;
  cursor: pointer;
  margin-bottom: 10px;
  position: relative;
  z-index: 99;
  border: none;
  border-radius: 3px;
  top: 5px;
  padding: 5px;
  right: 0;
  margin-top: -5px;
  top: -33px;
  right: 5px;
}

/* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area {
  left: 0;
  right: 0;
  width: 100%;
  top: 0;
  z-index: 99;
  position: absolute;
}

@media (max-width: 767px) {
  /* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area {
    padding-top: 0;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area {
    padding-top: 0;
  }
}

/* line 16, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area {
  padding: 25px 132px;
  background: #fff;
  background: transparent;
}

@media (max-width: 767px) {
  /* line 16, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area .main-header-area {
    padding: 10px 0px;
    background: #fff;
    border-bottom: 1px solid #fafafa;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 16, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area .main-header-area {
    padding: 10px 15px;
    background: #fff;
    border-bottom: 1px solid #fafafa;
  }
}

@media (min-width: 992px) and (max-width: 1200px) {
  /* line 16, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area .main-header-area {
    padding: 25px 0px;
  }
}

@media (min-width: 1200px) and (max-width: 1500px) {
  /* line 16, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area .main-header-area {
    padding: 25px 0px;
  }
}

/* line 38, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area.details_nav_bg {
  background: #727272;
  padding-bottom: 0;
}

@media (max-width: 767px) {
  /* line 38, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area .main-header-area.details_nav_bg {
    padding-bottom: 10px;
  }
}

/* line 58, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area .logo-img {
  text-align: center;
}

@media (max-width: 767px) {
  /* line 58, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area .main-header-area .logo-img {
    text-align: left;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 58, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area .main-header-area .logo-img {
    text-align: left;
  }
}

@media (min-width: 992px) and (max-width: 1200px) {
  /* line 58, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area .main-header-area .logo-img {
    text-align: left;
  }
}

@media (max-width: 767px) {
  /* line 72, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area .main-header-area .logo-img img {
    width: 70px;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 72, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area .main-header-area .logo-img img {
    width: 70px;
  }
}

/* line 84, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area .Appointment {
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  -webkit-align-items: center;
  -moz-align-items: center;
  -ms-align-items: center;
  align-items: center;
  -webkit-justify-content: flex-end;
  -moz-justify-content: flex-end;
  -ms-justify-content: flex-end;
  justify-content: flex-end;
  -ms-flex-pack: flex-end;
}

/* line 88, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area .Appointment .book_btn {
  margin-left: 30px;
}

@media (min-width: 992px) and (max-width: 1200px) {
  /* line 88, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area .main-header-area .Appointment .book_btn {
    margin-left: 0;
  }
}

@media (min-width: 1200px) and (max-width: 1500px) {
  /* line 88, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area .main-header-area .Appointment .book_btn {
    margin-left: 0;
  }
}

/* line 96, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area .Appointment .book_btn a {
  background: transparent;
  padding: 12px 26px;
  font-size: 15px;
  font-weight: 500;
  border: 1px solid #FF008C;
  color: #FF008C;
  -webkit-border-radius: 30px;
  -moz-border-radius: 30px;
  border-radius: 30px;
  -webkit-transition: 0.3s;
  -moz-transition: 0.3s;
  -o-transition: 0.3s;
  transition: 0.3s;
}

/* line 105, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area .Appointment .book_btn a:hover {
  color: #fff;
  border: 1px solid transparent;
  background: #FF008C;
  color: #fff;
}

@media (min-width: 992px) and (max-width: 1200px) {
  /* line 96, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area .main-header-area .Appointment .book_btn a {
    padding: 12px 20px;
  }
}

/* line 120, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area .main-menu {
  text-align: center;
  padding: 12px 0;
}

/* line 124, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area .main-menu ul li {
  display: inline-block;
  position: relative;
  margin: 0 10px;
}

/* line 134, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area .main-menu ul li a {
  color: #727272;
  font-size: 15px;
  text-transform: capitalize;
  font-weight: 400;
  display: inline-block;
  padding: 0px 0px 0px 0px;
  font-family: "Poppins", sans-serif;
  position: relative;
  text-transform: capitalize;
}

@media (min-width: 992px) and (max-width: 1200px) {
  /* line 134, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area .main-header-area .main-menu ul li a {
    font-size: 15px;
  }
}

@media (min-width: 1200px) and (max-width: 1500px) {
  /* line 134, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area .main-header-area .main-menu ul li a {
    font-size: 15px;
  }
}

/* line 153, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area .main-menu ul li a i {
  font-size: 9px;
}

@media (max-width: 767px) {
  /* line 153, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area .main-header-area .main-menu ul li a i {
    display: none !important;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 153, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area .main-header-area .main-menu ul li a i {
    display: none !important;
  }
}

/* line 174, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area .main-menu ul li a:hover::before {
  opacity: 1;
  transform: scaleX(1);
}

/* line 179, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area .main-menu ul li a.active::before {
  opacity: 1;
  transform: scaleX(1);
}

/* line 184, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area .main-menu ul li a:hover {
  color: #FF008C;
}

/* line 188, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area .main-menu ul li .submenu {
  position: absolute;
  left: 0;
  top: 160%;
  background: #fff;
  width: 200px;
  z-index: 2;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.02);
  opacity: 0;
  visibility: hidden;
  text-align: left;
  -webkit-transition: 0.6s;
  -moz-transition: 0.6s;
  -o-transition: 0.6s;
  transition: 0.6s;
}

/* line 200, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area .main-menu ul li .submenu li {
  display: block;
}

/* line 202, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area .main-menu ul li .submenu li a {
  padding: 10px 15px;
  position: inherit;
  -webkit-transition: 0.3s;
  -moz-transition: 0.3s;
  -o-transition: 0.3s;
  transition: 0.3s;
  display: block;
  color: #000;
}

/* line 208, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area .main-menu ul li .submenu li a::before {
  display: none;
}

/* line 212, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area .main-menu ul li .submenu li:hover a {
  color: #000;
}

/* line 217, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area .main-menu ul li:hover > .submenu {
  opacity: 1;
  visibility: visible;
  top: 150%;
}

/* line 222, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area .main-menu ul li:hover > a::before {
  opacity: 1;
  transform: scaleX(1);
}

/* line 226, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area .main-menu ul li:first-child a {
  padding-left: 0;
}

/* line 232, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area.sticky {
  box-shadow: 0px 3px 16px 0px rgba(0, 0, 0, 0.1);
  position: fixed;
  width: 100%;
  top: -70px;
  left: 0;
  right: 0;
  z-index: 990;
  transform: translateY(70px);
  transition: transform 500ms ease, background 500ms ease;
  -webkit-transition: transform 500ms ease, background 500ms ease;
  box-shadow: 0px 3px 16px 0px rgba(0, 0, 0, 0.1);
  background: rgba(255, 255, 255, 0.96);
  background: #fafafa;
}

@media (max-width: 767px) {
  /* line 232, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area .main-header-area.sticky {
    padding: 10px 0px;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 232, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area .main-header-area.sticky {
    padding: 10px 0px;
  }
}

/* line 262, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area.sticky .main-menu {
  padding: 0;
}

/* line 265, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area.sticky .header_bottom_border {
  border-bottom: none;
}

/* line 268, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .main-header-area.sticky .header_bottom_border.white_border {
  border-bottom: none !important;
}

/* line 274, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .header-top_area {
  padding: 12px 0;
  background: rgba(44, 44, 44, 0.5);
}

@media (max-width: 767px) {
  /* line 277, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area .header-top_area .social_media_links {
    text-align: center;
  }
}

/* line 281, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .header-top_area .social_media_links a {
  font-size: 15px;
  color: #fff;
  margin-right: 12px;
}

/* line 285, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .header-top_area .social_media_links a:hover {
  color: #28AE60;
}

/* line 290, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .header-top_area .short_contact_list {
  text-align: right;
}

@media (max-width: 767px) {
  /* line 290, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area .header-top_area .short_contact_list {
    text-align: center;
  }
}

/* line 296, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .header-top_area .short_contact_list ul li {
  display: inline-block;
}

/* line 298, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .header-top_area .short_contact_list ul li a {
  font-size: 13px;
  color: #fff;
  margin-left: 50px;
}

@media (max-width: 767px) {
  /* line 298, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header-area .header-top_area .short_contact_list ul li a {
    margin-left: 0;
    margin: 0 5px;
  }
}

/* line 307, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header-area .header-top_area .short_contact_list ul li a i {
  color: #28AE60;
  margin-right: 7px;
}

/* line 317, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header_bottom_border {
  border-bottom: 1px solid #4B4E50;
  padding-bottom: 22px;
}

/* line 320, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
.header_bottom_border.white_border {
  border-bottom: 1px solid rgba(255, 255, 255, 0.2) !important;
}

@media (max-width: 767px) {
  /* line 320, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header_bottom_border.white_border {
    padding: 0;
    border-bottom: none;
  }
}

@media (max-width: 767px) {
  /* line 320, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header_bottom_border.white_border {
    padding: 0;
    border-bottom: none !important;
  }
}

@media (max-width: 767px) {
  /* line 317, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_header.scss */
  .header_bottom_border {
    padding: 0;
    border-bottom: none;
  }
}

/* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
.slider_bg_1 {
  background-image: url(../img/banner/banner.png);
}

/* line 4, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
.slider_bg_2 {
  background-image: url(../img/banner/banner2.png);
}

/* line 7, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
.poly_img {
  position: absolute;
  right: 15%;
  top: 36%;
}

/* line 13, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
.slider_area .single_slider {
  /* position: relative; */
  /* z-index: 0; */
  height: 100px;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
}

@media (max-width: 767px) {
  /* line 13, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
  .slider_area .single_slider {
    height: 500px;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 13, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
  .slider_area .single_slider {
    height: 620px;
  }
}

/* line 28, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
.slider_area .single_slider .text {
  padding-top: 190px;
}

/* line 31, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
.slider_area .single_slider .ilstrator_thumb {
  margin-top: 50px;
}

/* line 33, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
.slider_area .single_slider .ilstrator_thumb img {
  width: 100%;
}

/* line 37, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
.slider_area .single_slider .phone_thumb {
  position: relative;
  top: 110px;
}

@media (max-width: 767px) {
  /* line 37, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
  .slider_area .single_slider .phone_thumb {
    top: 60px;
  }
}

@media (max-width: 767px) {
  /* line 43, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
  .slider_area .single_slider .phone_thumb img {
    width: 100%;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 43, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
  .slider_area .single_slider .phone_thumb img {
    width: 100%;
  }
}

@media (min-width: 992px) and (max-width: 1200px) {
  /* line 43, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
  .slider_area .single_slider .phone_thumb img {
    width: 100%;
  }
}

/* line 56, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
.slider_area .single_slider .slider_text h3 {
  color: #001D38;
  font-family: "Poppins", sans-serif;
  font-size: 24px;
  text-transform: capitalize;
  font-weight: 500;
  line-height: 66px;
  margin-bottom: 9px;
  margin-bottom: 20px;
}

@media (max-width: 767px) {
  /* line 65, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
  .slider_area .single_slider .slider_text h3 br {
    display: none;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 65, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
  .slider_area .single_slider .slider_text h3 br {
    display: none;
  }
}

@media (min-width: 992px) and (max-width: 1200px) {
  /* line 65, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
  .slider_area .single_slider .slider_text h3 br {
    display: none;
  }
}

/* line 76, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
.slider_area .single_slider .slider_text h3 span {
  font-weight: 700;
}

@media (max-width: 767px) {
  /* line 56, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
  .slider_area .single_slider .slider_text h3 {
    font-size: 30px;
    line-height: 35px;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 56, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
  .slider_area .single_slider .slider_text h3 {
    font-size: 30px;
    line-height: 35px;
  }
}

@media (min-width: 992px) and (max-width: 1200px) {
  /* line 56, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
  .slider_area .single_slider .slider_text h3 {
    font-size: 45px;
    letter-spacing: 3px;
    line-height: 55px;
  }
}

/* line 96, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
.slider_area .single_slider .slider_text span {
  font-size: 30px;
  font-weight: 400;
  color: #FFFFFF;
  position: relative;
  z-index: 1;
}

/* line 102, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
.slider_area .single_slider .slider_text span::before {
  position: absolute;
  background: #fff;
  width: 50px;
  height: 2px;
  content: '';
  left: -67px;
  top: 50%;
  margin-bottom: -1px;
}

@media (min-width: 992px) and (max-width: 1200px) {
  /* line 96, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
  .slider_area .single_slider .slider_text span {
    font-size: 16px;
  }
}

@media (max-width: 767px) {
  /* line 96, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
  .slider_area .single_slider .slider_text span {
    font-size: 16px;
  }
}

/* line 119, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
.slider_area .single_slider .slider_text .video_service_btn > a {
  margin-right: 15px;
}

@media (max-width: 767px) {
  /* line 119, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
  .slider_area .single_slider .slider_text .video_service_btn > a {
    margin-bottom: 20px;
  }
}

/* line 129, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
.shap_img_1 {
  position: absolute;
  left: 0;
  top: 0;
}

@media (min-width: 992px) and (max-width: 1200px) {
  /* line 129, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
  .shap_img_1 {
    width: 40%;
  }
}

@media (min-width: 1200px) and (max-width: 1500px) {
  /* line 129, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
  .shap_img_1 {
    width: 40%;
  }
}

/* line 139, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
.shap_img_1 img {
  width: 100%;
}

/* line 143, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
.shap_big_2 {
  position: absolute;
  right: 0;
  top: 59%;
  width: 36%;
}

@media (min-width: 992px) and (max-width: 1200px) {
  /* line 143, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
  .shap_big_2 {
    width: 40%;
  }
}

@media (min-width: 1200px) and (max-width: 1500px) {
  /* line 143, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
  .shap_big_2 {
    width: 40%;
  }
}

/* line 154, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
.shap_big_2 img {
  width: 100%;
}

/* line 157, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_slider.scss */
.shap_big_2.Another_shap_big {
  right: 0;
  top: 25%;
}

/* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_features.scss */
.features_area {
  padding-top: 100px;
  padding-bottom: 140px;
}

@media (max-width: 767px) {
  /* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_features.scss */
  .features_area {
    padding-top: 0;
    padding-bottom: 30px;
  }
}

/* line 8, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_features.scss */
.features_area .section_title {
  margin-bottom: 100px;
}

/* line 11, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_features.scss */
.features_area .single_feature {
  margin-bottom: 60px;
  padding-right: 50px;
}

@media (max-width: 767px) {
  /* line 11, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_features.scss */
  .features_area .single_feature {
    padding-right: 0;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 11, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_features.scss */
  .features_area .single_feature {
    padding-right: 20px;
  }
}

/* line 23, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_features.scss */
.features_area .single_feature h4 {
  font-size: 18px;
  margin-top: 32px;
  margin-bottom: 13px;
  font-weight: 400;
}

/* line 29, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_features.scss */
.features_area .single_feature p {
  font-size: 15px;
  margin-bottom: 0;
}

/* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_counter.scss */
.counter_area {
  padding-bottom: 120px;
  padding-top: 75px;
}

@media (max-width: 767px) {
  /* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_counter.scss */
  .counter_area {
    padding-bottom: 30px;
    padding-top: 60px;
  }
}

/* line 8, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_counter.scss */
.counter_area .single_counter {
  border: 1px solid #E8E8E8;
  padding: 50px 0 43px 0;
  margin-bottom: 30px;
  -webkit-transition: 0.3s;
  -moz-transition: 0.3s;
  -o-transition: 0.3s;
  transition: 0.3s;
}

/* line 13, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_counter.scss */
.counter_area .single_counter h3 {
  margin-bottom: 16px;
}

/* line 15, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_counter.scss */
.counter_area .single_counter h3 span {
  color: #615CFD;
  font-size: 50px;
  font-weight: 700;
}

@media (max-width: 767px) {
  /* line 15, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_counter.scss */
  .counter_area .single_counter h3 span {
    font-size: 35px;
  }
}

/* line 22, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_counter.scss */
.counter_area .single_counter h3 span span {
  position: relative;
  top: -2px;
}

/* line 29, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_counter.scss */
.counter_area .single_counter p {
  font-size: 15px;
  color: #001D38;
  font-weight: 400;
  margin-bottom: 0;
}

/* line 35, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_counter.scss */
.counter_area .single_counter:hover {
  border: 1px solid #615CFD;
}

/* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_about.scss */
.about_me {
  padding-top: 75px;
  padding-bottom: 150px;
  position: relative;
}

@media (max-width: 767px) {
  /* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_about.scss */
  .about_me {
    padding-top: 0;
    padding-bottom: 0;
  }
}

@media (min-width: 992px) and (max-width: 1200px) {
  /* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_about.scss */
  .about_me {
    padding-bottom: 100px;
  }
}

/* line 12, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_about.scss */
.about_me .about_large_title {
  font-weight: 800;
  color: #F5F6F7;
  font-size: 235px;
  position: absolute;
  left: 21%;
  top: 0;
  line-height: 1;
}

@media (max-width: 767px) {
  /* line 21, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_about.scss */
  .about_me .about_e_details {
    margin-bottom: 30px;
  }
}

/* line 25, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_about.scss */
.about_me .about_e_details h3 {
  font-size: 50px;
  font-weight: 700;
  color: #001D38;
}

/* line 30, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_about.scss */
.about_me .about_e_details p {
  font-size: 15px;
  font-weight: 400;
  color: #727272;
  margin-top: 20px;
  margin-bottom: 36px;
}

/* line 43, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_about.scss */
.about_me .about_img {
  position: relative;
}

/* line 45, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_about.scss */
.about_me .about_img .color_pattern {
  position: absolute;
  right: -80px;
  top: -123px;
  z-index: -1;
}

@media (min-width: 992px) and (max-width: 1200px) {
  /* line 45, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_about.scss */
  .about_me .about_img .color_pattern {
    right: 0;
  }
}

@media (min-width: 1200px) and (max-width: 1500px) {
  /* line 45, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_about.scss */
  .about_me .about_img .color_pattern {
    right: 0;
  }
}

/* line 58, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_about.scss */
.about_me .about_img .my_Pic img {
  width: 100%;
}

/* line 66, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_about.scss */
.project_area {
  padding-bottom: 150px;
}

@media (max-width: 767px) {
  /* line 66, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_about.scss */
  .project_area {
    padding-bottom: 50px;
  }
}

/* line 72, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_about.scss */
.project_area .projects_thumb img {
  width: 100%;
}

/* line 76, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_about.scss */
.project_area .projects_info {
  padding-left: 68px;
}

@media (max-width: 767px) {
  /* line 76, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_about.scss */
  .project_area .projects_info {
    padding-left: 0;
    margin: 20px 0;
  }
}

/* line 82, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_about.scss */
.project_area .projects_info h3 {
  font-size: 30px;
  font-weight: 700;
  line-height: 62px;
  margin-bottom: 0;
}

/* line 88, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_about.scss */
.project_area .projects_info p {
  font-size: 15px;
  line-height: 28px;
  margin-top: 10px;
  margin-bottom: 20px;
}

/* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_details.scss */
.case_details_area {
  padding-top: 0px;
}

@media (max-width: 767px) {
  /* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_details.scss */
  .case_details_area {
    margin-top: 0px;
  }
}

/* line 6, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_details.scss */
.case_details_area .border_bottom {
  border-bottom: 1px solid #E8E8E8;
  padding-bottom: 30px;
}

/* line 10, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_details.scss */
.case_details_area .case_thumb img {
  width: 100%;
}

/* line 13, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_details.scss */
.case_details_area .details_title {
  margin-bottom: 60px;
}

/* line 15, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_details.scss */
.case_details_area .details_title span {
  font-size: 15px;
  color: #919191;
  font-weight: 400;
}

/* line 20, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_details.scss */
.case_details_area .details_title h3 {
  font-size: 46px;
  font-weight: 300;
  color: #001D38;
}

@media (max-width: 767px) {
  /* line 20, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_details.scss */
  .case_details_area .details_title h3 {
    font-size: 28px;
  }
}

/* line 30, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_details.scss */
.case_details_area .details_main_wrap .details_info {
  color: #001D38;
  font-weight: 400;
  font-size: 20px;
  margin-top: 54px;
  margin-bottom: 35px;
}

/* line 37, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_details.scss */
.case_details_area .details_main_wrap .single_details {
  margin-bottom: 30px;
}

/* line 39, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_details.scss */
.case_details_area .details_main_wrap .single_details span {
  font-weight: 500;
  font-size: 22px;
  color: #001D38;
}

/* line 44, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_details.scss */
.case_details_area .details_main_wrap .single_details p {
  color: #727272;
  font-size: 15px;
  font-weight: 400;
  margin-bottom: 0;
}

/* line 51, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_details.scss */
.case_details_area .details_main_wrap .single_details ul li {
  display: inline-block;
  margin-right: 4px;
}

@media (max-width: 767px) {
  /* line 51, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_details.scss */
  .case_details_area .details_main_wrap .single_details ul li {
    display: block;
    margin-right: 4px;
    margin: 0;
    margin: 10px 0;
    text-align: center;
  }
}

/* line 61, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_details.scss */
.case_details_area .details_main_wrap .single_details ul li a {
  background: #3B5997;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  font-size: 14px;
  font-weight: 400;
  display: inline-block;
  color: #fff;
  padding: 9px 26px;
  font-size: 14px;
}

@media (max-width: 767px) {
  /* line 61, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_details.scss */
  .case_details_area .details_main_wrap .single_details ul li a {
    display: block;
  }
}

/* line 74, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_details.scss */
.case_details_area .details_main_wrap .single_details ul li:nth-child(2) a {
  background: #1DA1F2 !important;
}

/* line 77, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_details.scss */
.case_details_area .details_main_wrap .single_details ul li:nth-child(3) a {
  background: #B21D23 !important;
}

/* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
.gallery_area {
  padding-top: 150px;
  padding-bottom: 150px;
}

@media (max-width: 767px) {
  /* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
  .gallery_area {
    padding-top: 50px;
    padding-bottom: 50px;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
  .gallery_area {
    padding-top: 100px;
    padding-bottom: 100px;
  }
}

/* line 12, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
.gallery_area .single-gallery {
  overflow: hidden;
  position: relative;
}

/* line 15, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
.gallery_area .single-gallery img {
  width: 100%;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
  -webkit-transition: 0.5s;
  -moz-transition: 0.5s;
  -o-transition: 0.5s;
  transition: 0.5s;
}

/* line 20, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
.gallery_area .single-gallery .gallery_hover {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  display: table;
  text-align: center;
  background: rgba(40, 174, 96, 0.7);
  -webkit-transform: translateX(-50%);
  -moz-transform: translateX(-50%);
  -ms-transform: translateX(-50%);
  transform: translateX(-50%);
  opacity: 0;
  -webkit-transition: 0.5s;
  -moz-transition: 0.5s;
  -o-transition: 0.5s;
  transition: 0.5s;
  visibility: hidden;
}

/* line 33, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
.gallery_area .single-gallery .gallery_hover .hover_inner {
  display: table-cell;
  vertical-align: middle;
}

/* line 36, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
.gallery_area .single-gallery .gallery_hover .hover_inner h3 {
  font-size: 22px;
  color: #fff;
  font-weight: 400;
}

/* line 41, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
.gallery_area .single-gallery .gallery_hover .hover_inner span {
  color: #fff;
  font-size: 14px;
  font-weight: 300;
}

/* line 49, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
.gallery_area .single-gallery:hover .gallery_hover {
  -webkit-transform: translateX(0%);
  -moz-transform: translateX(0%);
  -ms-transform: translateX(0%);
  transform: translateX(0%);
  visibility: visible;
  opacity: 1;
}

/* line 54, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
.gallery_area .single-gallery:hover img {
  -webkit-transform: scale(1.05);
  -moz-transform: scale(1.05);
  -ms-transform: scale(1.05);
  transform: scale(1.05);
}

/* line 59, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
.gallery_area .More_Works_btn {
  margin-top: 40px;
}

/* line 64, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
.portfolio_details_area {
  padding-top: 280px;
  padding-bottom: 150px;
}

@media (max-width: 767px) {
  /* line 64, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
  .portfolio_details_area {
    padding-top: 100px;
    padding-bottom: 50px;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 64, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
  .portfolio_details_area {
    padding-top: 100px;
    padding-bottom: 100px;
  }
}

/* line 76, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
.portfolio_details_area .portfolio_details_thumb img {
  width: 100%;
}

/* line 81, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
.portfolio_details_area .portfolio_details_content span {
  font-size: 14px;
  font-weight: 300;
  color: #919191;
}

/* line 86, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
.portfolio_details_area .portfolio_details_content h3 {
  color: #2C2C2C;
  font-size: 36px;
  font-weight: 400;
  line-height: 55px;
  margin-top: 15px;
  margin-bottom: 25px;
}

@media (max-width: 767px) {
  /* line 86, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
  .portfolio_details_area .portfolio_details_content h3 {
    font-size: 25px;
    line-height: 40px;
  }
}

/* line 98, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
.portfolio_details_area .portfolio_details_content h4 {
  font-size: 20px;
  font-weight: 400;
  color: #2C2C2C;
}

/* line 103, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
.portfolio_details_area .portfolio_details_content p {
  font-size: 16px;
  font-family: "Poppins", sans-serif;
  color: #727272;
  line-height: 28px;
}

/* line 112, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
.mt-50 {
  margin-top: 50px;
}

@media (max-width: 767px) {
  /* line 112, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
  .mt-50 {
    margin-top: 30px;
  }
}

/* line 118, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
.mb-50 {
  margin-bottom: 50px;
}

@media (max-width: 767px) {
  /* line 118, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_gallery.scss */
  .mb-50 {
    margin-bottom: 30px;
  }
}

/* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer {
  background-repeat: no-repeat;
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  background: #001D38;
}

/* line 7, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .pro_border {
  padding-top: 103px;
  padding-bottom: 50px;
  border-bottom: 1px solid #334A60;
}

/* line 12, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .pro_border .lets_projects h3 {
  color: #fff;
  font-size: 30px;
  font-weight: 400;
}

@media (max-width: 767px) {
  /* line 12, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
  .footer .pro_border .lets_projects h3 {
    color: #fff;
    font-size: 19px;
  }
}

/* line 20, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .pro_border .lets_projects h3 a {
  color: #FF008C;
}

/* line 25, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .pro_border .phone_number {
  text-align: right;
}

@media (max-width: 767px) {
  /* line 25, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
  .footer .pro_border .phone_number {
    text-align: center;
  }
}

/* line 30, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .pro_border .phone_number h3 {
  font-size: 30px;
  font-weight: 300;
  color: #fff;
}

/* line 35, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .pro_border .phone_number a {
  color: #C7C7C7;
  font-size: 15px;
  font-weight: 300;
}

/* line 39, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .pro_border .phone_number a:hover {
  color: #FF008C;
}

/* line 45, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .footer_top {
  padding-top: 70px;
  padding-bottom: 129px;
}

@media (max-width: 767px) {
  /* line 45, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
  .footer .footer_top {
    padding-top: 60px;
    padding-bottom: 30px;
  }
}

@media (max-width: 767px) {
  /* line 52, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
  .footer .footer_top .footer_widget {
    margin-bottom: 30px;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 52, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
  .footer .footer_top .footer_widget {
    margin-bottom: 30px;
  }
}

/* line 59, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .footer_top .footer_widget .footer_title {
  font-size: 18px;
  font-weight: 500;
  color: #fff;
  text-transform: capitalize;
  margin-bottom: 40px;
}

@media (max-width: 767px) {
  /* line 59, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
  .footer .footer_top .footer_widget .footer_title {
    margin-bottom: 20px;
  }
}

/* line 69, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .footer_top .footer_widget .footer_logo {
  font-size: 22px;
  font-weight: 400;
  color: #fff;
  text-transform: capitalize;
  margin-bottom: 40px;
}

@media (max-width: 767px) {
  /* line 69, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
  .footer .footer_top .footer_widget .footer_logo {
    margin-bottom: 20px;
  }
}

/* line 79, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .footer_top .footer_widget p {
  color: #919191;
  font-size: 13px;
  font-weight: 400;
  line-height: 28px;
}

/* line 85, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .footer_top .footer_widget p a {
  color: #919191;
}

/* line 87, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .footer_top .footer_widget p a:hover {
  color: #FF008C;
}

/* line 93, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .footer_top .footer_widget p.footer_text {
  font-size: 16px;
  color: #B2B2B2;
  margin-bottom: 23px;
  font-weight: 400;
  line-height: 28px;
}

/* line 99, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .footer_top .footer_widget p.footer_text a.domain {
  color: #B2B2B2;
  font-weight: 400;
}

/* line 102, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .footer_top .footer_widget p.footer_text a.domain:hover {
  color: #FD955D;
  border-bottom: 1px solid #FD955D;
}

/* line 108, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .footer_top .footer_widget p.footer_text.doanar a {
  font-weight: 500;
  color: #B2B2B2;
}

/* line 112, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .footer_top .footer_widget p.footer_text.doanar a:hover {
  color: #FD955D;
  border-bottom: 1px solid #FD955D;
}

/* line 116, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .footer_top .footer_widget p.footer_text.doanar a.first {
  margin-bottom: 10px;
}

/* line 124, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .footer_top .footer_widget ul li {
  color: #919191;
  font-size: 13px;
  line-height: 42px;
}

/* line 128, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .footer_top .footer_widget ul li a {
  color: #919191;
  font-weight: 400;
}

/* line 131, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .footer_top .footer_widget ul li a:hover {
  color: #FF008C;
}

/* line 137, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .footer_top .footer_widget .newsletter_form {
  position: relative;
  margin-bottom: 20px;
}

/* line 140, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .footer_top .footer_widget .newsletter_form input {
  width: 100%;
  height: 50px;
  background: transparent;
  padding-left: 20px;
  font-size: 15px;
  color: #fff;
  border: none;
  border: 1px solid #334A60;
  border-radius: 30px;
}

/* line 150, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .footer_top .footer_widget .newsletter_form input::placeholder {
  font-size: 15px;
  color: #919191;
}

/* line 154, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .footer_top .footer_widget .newsletter_form input:focus {
  outline: none;
}

/* line 158, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .footer_top .footer_widget .newsletter_form button {
  position: absolute;
  top: 0;
  right: 0;
  height: 40px;
  border: none;
  font-size: 14px;
  color: #fff;
  padding: 10px;
  padding: 0 22px;
  cursor: pointer;
  border-radius: 30px;
  top: 5px;
  right: 5px;
  font-size: 13px;
  font-weight: 500;
}

/* line 177, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .footer_top .footer_widget .newsletter_text {
  font-size: 13px;
  color: #919191;
  line-height: 26px;
}

/* line 184, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .copy-right_text {
  padding-bottom: 30px;
  background: #002140;
}

/* line 187, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .copy-right_text .footer_border {
  padding-bottom: 30px;
}

/* line 191, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .copy-right_text .copy_right {
  font-size: 15px;
  color: #919191;
  margin-bottom: 0;
  font-weight: 400;
}

@media (max-width: 767px) {
  /* line 191, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
  .footer .copy-right_text .copy_right {
    font-size: 13px;
  }
}

/* line 199, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .copy-right_text .copy_right a {
  color: #FF008C;
}

/* line 204, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .socail_links {
  margin-top: 47px;
}

@media (max-width: 767px) {
  /* line 204, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
  .footer .socail_links {
    margin-top: 30px;
  }
}

/* line 210, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .socail_links ul li {
  display: inline-block;
}

/* line 213, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .socail_links ul li a {
  font-size: 15px;
  color: #C3B2F0;
  width: 40px;
  height: 40px;
  display: inline-block;
  text-align: center;
  background: transparent;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  line-height: 40px !important;
  margin-right: 7px;
  color: #4D6174;
  line-height: 40px !important;
  border: 1px solid #1A344C;
}

/* line 227, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_footer.scss */
.footer .socail_links ul li a:hover {
  color: #fff !important;
  border-color: transparent;
}

/* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.bradcam_bg_1 {
  background-image: url(../img/banner/bradcam.png);
}

/* line 4, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.breadcam_bg_2 {
  background-image: url(../img/banner/bradcam_2.png);
}

/* line 7, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.breadcam_bg_3 {
  background-image: url(../img/banner/bradcam3.png);
}

/* line 10, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.breadcam_bg_4 {
  background-image: url(../img/banner/bradcam_4.png);
}

/* line 13, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.bradcam_area {
  background-size: cover;
  background-position: bottom;
  padding: 190px 0 100px 0;
  background-repeat: no-repeat;
  position: relative;
  z-index: 0;
}

@media (max-width: 767px) {
  /* line 13, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
  .bradcam_area {
    padding: 120px 0;
  }
}

/* line 35, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.bradcam_area h3 {
  font-size: 50px;
  color: #001D38;
  font-weight: 500;
  margin-bottom: 2px;
  text-transform: capitalize;
}

@media (max-width: 767px) {
  /* line 35, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
  .bradcam_area h3 {
    font-size: 30px;
  }
}

/* line 45, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.bradcam_area p {
  font-size: 18px;
  color: #fff;
  font-weight: 400;
  text-transform: capitalize;
}

/* line 50, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.bradcam_area p a {
  color: #fff;
}

/* line 52, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.bradcam_area p a:hover {
  color: #fff;
}

/* line 59, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.popup_box {
  background: #fff;
  display: inline-block;
  z-index: 9;
  width: 558px;
}

/* line 66, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.popup_box .boxed-btn3 {
  width: 100%;
  text-transform: capitalize;
}

/* line 70, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.popup_box .popup_header {
  background: #F5FBFF;
  padding: 28px 0;
  display: block;
}

/* line 74, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.popup_box .popup_header h3 {
  text-align: center;
  font-size: 20px;
  color: #2C2C2C;
  margin-bottom: 0;
  font-weight: 400;
}

/* line 82, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.popup_box .custom_form {
  padding: 60px 68px;
}

/* line 86, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.popup_box input {
  width: 100%;
  height: 50px;
  border: none;
  border-bottom: 1px solid #C7C7C7;
  padding: 15px 0;
  margin-bottom: 20px;
}

/* line 93, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.popup_box input::placeholder {
  color: #919191;
  font-weight: 400;
}

/* line 97, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.popup_box input:focus {
  outline: none;
}

/* line 101, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.popup_box textarea {
  width: 100%;
  border: none;
  margin-top: 112px;
  border-bottom: 1px solid #C7C7C7;
  padding: 15px 0;
  margin-bottom: 20px;
  height: 55px;
  resize: none;
  margin-bottom: 40px;
}

/* line 112, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.popup_box textarea::placeholder {
  color: #919191;
  font-weight: 400;
}

/* line 116, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.popup_box textarea:focus {
  outline: none;
}

/* line 120, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.popup_box .nice-select {
  -webkit-tap-highlight-color: transparent;
  background-color: #fff;
  /* border-radius: 5px; */
  border: solid 1px #E2E2E2;
  box-sizing: border-box;
  clear: both;
  cursor: pointer;
  display: block;
  float: left;
  font-family: "Poppins", sans-serif;
  font-weight: normal;
  width: 100% !important;
  /* height: 42px; */
  line-height: 50px;
  outline: none;
  padding-left: 18px;
  padding-right: 30px;
  position: relative;
  text-align: left !important;
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  white-space: nowrap;
  width: auto;
  border-radius: 0;
  margin-bottom: 30px;
  height: 50px !important;
  font-size: 16px;
  font-weight: 400;
  color: #919191;
}

/* line 154, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.popup_box .nice-select::after {
  content: "\f0d7";
  display: block;
  height: 5px;
  margin-top: -5px;
  pointer-events: none;
  position: absolute;
  right: 17px;
  top: 3px;
  transition: all 0.15s ease-in-out;
  width: 5px;
  font-family: fontawesome;
  color: #919191;
  font-size: 15px;
}

/* line 169, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.popup_box .nice-select.open .list {
  opacity: 1;
  pointer-events: auto;
  -webkit-transform: scale(1) translateY(0);
  -ms-transform: scale(1) translateY(0);
  transform: scale(1) translateY(0);
  height: 200px;
  overflow-y: scroll;
}

/* line 178, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.popup_box .nice-select.list {
  height: 200px;
  overflow-y: scroll;
}

/* line 184, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
#test-form {
  display: inline-block;
  margin: auto;
  text-align: center;
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

/* line 192, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
#test-form .mfp-close-btn-in .mfp-close {
  color: #333;
  display: none !important;
}

/* line 197, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
#test-form button.mfp-close {
  display: none !important;
}

/* line 202, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.mfp-bg {
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1042;
  overflow: hidden;
  position: fixed;
  background: #000000;
  opacity: .7;
}

/* line 215, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.brad_cam_lists {
  display: inline-block;
}

/* line 217, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.brad_cam_lists ul {
  background: transparent;
  margin-bottom: 0;
}

/* line 220, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.brad_cam_lists ul li {
  font-size: 15px;
}

/* line 222, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.brad_cam_lists ul li a {
  color: #727272;
  font-size: 15px;
  font-weight: 400;
}

/* line 227, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.brad_cam_lists ul li.active {
  color: #727272;
}

/* line 230, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.brad_cam_lists ul li:hover a {
  color: #FF008C;
}

/* line 235, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.brad_cam_lists .breadcrumb-item + .breadcrumb-item::before {
  display: inline-block;
  padding-right: .5rem;
  padding-left: .5rem;
  color: #727272;
  content: "/";
}

/* line 245, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.bradcam_shap {
  position: absolute;
  left: 0;
  top: 0;
  width: 21%;
}

/* line 250, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_bradcam.scss */
.bradcam_shap img {
  width: 100%;
}

/* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_department.scss */
.our_department_area {
  background: #F5FBFF;
  padding-top: 120px;
  padding-bottom: 90px;
}

/* line 5, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_department.scss */
.our_department_area .single_department {
  background: #fff;
  margin-bottom: 30px;
  -webkit-box-shadow: 0 6px 10px rgba(0, 0, 0, 0.04);
  -moz-box-shadow: 0 6px 10px rgba(0, 0, 0, 0.04);
  box-shadow: 0 6px 10px rgba(0, 0, 0, 0.04);
}

/* line 9, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_department.scss */
.our_department_area .single_department .department_thumb {
  overflow: hidden;
  border-top-right-radius: 5px;
  border-top-left-radius: 5px;
}

/* line 13, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_department.scss */
.our_department_area .single_department .department_thumb img {
  width: 100%;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
  -webkit-transition: 0.3s;
  -moz-transition: 0.3s;
  -o-transition: 0.3s;
  transition: 0.3s;
}

/* line 19, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_department.scss */
.our_department_area .single_department .department_content {
  padding: 22px 30px 24px 30px;
}

/* line 21, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_department.scss */
.our_department_area .single_department .department_content h3 {
  margin-bottom: 0;
}

/* line 23, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_department.scss */
.our_department_area .single_department .department_content h3 a {
  font-size: 22px;
  color: #1F1F1F;
  line-height: 33px;
  font-weight: 500;
}

/* line 28, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_department.scss */
.our_department_area .single_department .department_content h3 a:hover {
  color: #5DB2FF;
}

/* line 33, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_department.scss */
.our_department_area .single_department .department_content p {
  font-size: 16px;
  line-height: 28px;
  color: #727272;
  margin-top: 5px;
  margin-bottom: 10px;
}

/* line 40, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_department.scss */
.our_department_area .single_department .department_content a.learn_more {
  color: #5DB2FF;
  font-size: 16px;
}

/* line 43, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_department.scss */
.our_department_area .single_department .department_content a.learn_more:hover {
  text-decoration: underline;
}

/* line 50, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_department.scss */
.our_department_area .single_department:hover .department_thumb img {
  -webkit-transform: scale(1.2);
  -moz-transform: scale(1.2);
  -ms-transform: scale(1.2);
  transform: scale(1.2);
}

/* line 2, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_tesmonial.scss */
.testimonial_area {
  padding: 152px 0 146px 0;
  background-image: url(../img/banner/banner_testmonial.png);
  position: relative;
  z-index: 0;
  background-size: cover;
  background-position: top left;
  background-size: 100% 100%;
}

@media (max-width: 767px) {
  /* line 2, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_tesmonial.scss */
  .testimonial_area {
    padding: 50px 0;
  }
}

/* line 14, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_tesmonial.scss */
.testimonial_area .single_testmonial p {
  color: #fff;
  font-weight: 400;
  font-size: 20px;
  line-height: 32px;
  margin: 34px 0;
}

@media (min-width: 320px) and (max-width: 1500px) {
  /* line 20, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_tesmonial.scss */
  .testimonial_area .single_testmonial p br {
    display: none;
  }
}

/* line 28, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_tesmonial.scss */
.testimonial_area .single_testmonial .testmonial_author .thumb {
  width: 42px;
  height: 42px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  margin: auto;
  margin: auto auto 15px auto;
}

/* line 35, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_tesmonial.scss */
.testimonial_area .single_testmonial .testmonial_author h3 {
  color: #fff;
  font-size: 15px;
  font-weight: 500;
  margin-bottom: 5px;
}

/* line 41, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_tesmonial.scss */
.testimonial_area .single_testmonial .testmonial_author span {
  font-size: 13px;
  font-weight: 400;
  color: #fff;
}

/* line 48, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_tesmonial.scss */
.testimonial_area .owl-carousel .owl-item img {
  display: inline-block;
  width: auto;
}

/* line 52, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_tesmonial.scss */
.testimonial_area .owl-carousel .owl-nav div.owl-next {
  left: auto;
  right: 0;
}

/* line 56, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_tesmonial.scss */
.testimonial_area .owl-carousel .owl-nav div {
  left: 0;
}

/* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_discuss.scss */
.discuss_projects {
  background: #001D38;
  padding: 150px 0 50px 0;
}

@media (max-width: 767px) {
  /* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_discuss.scss */
  .discuss_projects {
    padding: 50px 0 50px 0;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_discuss.scss */
  .discuss_projects {
    padding: 100px 0 50px 0;
  }
}

/* line 11, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_discuss.scss */
.discuss_projects .project_text h3 {
  color: #fff;
  font-size: 50px;
  font-weight: 700;
}

@media (max-width: 767px) {
  /* line 11, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_discuss.scss */
  .discuss_projects .project_text h3 {
    font-size: 38px;
  }
}

/* line 19, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_discuss.scss */
.discuss_projects .project_text p {
  color: #fff;
  font-size: 15px;
  line-height: 28px;
  margin-bottom: 30px;
  margin-top: 12px;
}

/* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
.service_area {
  /* padding-top: 200px; */
  padding-bottom: 70px;
}

/* line 4, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
.service_area.minus_padding {
  padding-top: 0;
}

@media (max-width: 767px) {
  /* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
  .service_area {
    padding-bottom: 30px;
    padding-top: 80px;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
  .service_area {
    padding-bottom: 50px;
  }
}

/* line 15, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
.service_area .single_service {
  padding: 48px 35px 45px 35px;
  -webkit-transition: 0.3s;
  -moz-transition: 0.3s;
  -o-transition: 0.3s;
  transition: 0.3s;
  margin-bottom: 30px;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.04);
  -webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  border-radius: 10px;
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 15, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
  .service_area .single_service {
    padding: 30px 20px;
  }
}

/* line 24, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
.service_area .single_service .icon {
  width: 95px;
  height: 95px;
  background: #F5F5FF;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  line-height: 95px;
  margin: auto;
}

/* line 32, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
.service_area .single_service h3 {
  font-size: 22px;
  font-weight: 400;
  color: #001D38;
  margin-top: 24px;
  padding-bottom: 3px;
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 32, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
  .service_area .single_service h3 {
    font-size: 20px;
  }
}

/* line 42, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
.service_area .single_service p {
  color: #727272;
  font-size: 15px;
  font-weight: 400;
  line-height: 28px;
  margin-bottom: 26px;
}

/* line 50, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
.service_area .col-xl-4:nth-child(2) .single_service .icon {
  background: #FFF0F8;
}

/* line 53, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
.service_area .col-xl-4:nth-child(3) .single_service .icon {
  background: #EFFDF5;
}

/* line 59, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
.compapy_info {
  padding-bottom: 70px;
  padding-top: 100px;
}

/* line 62, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
.compapy_info.minus_padding {
  padding-top: 0;
}

@media (max-width: 767px) {
  /* line 59, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
  .compapy_info {
    padding-bottom: 20px;
    padding-top: 20px;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 59, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
  .compapy_info {
    padding-bottom: 20px;
    padding-top: 20px;
  }
}

/* line 73, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
.compapy_info .man_thumb {
  margin-bottom: 30px;
  padding-right: 20px;
}

@media (max-width: 767px) {
  /* line 73, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
  .compapy_info .man_thumb {
    padding-right: 0;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 73, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
  .compapy_info .man_thumb {
    padding-right: 0;
  }
}

@media (min-width: 992px) and (max-width: 1200px) {
  /* line 73, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
  .compapy_info .man_thumb {
    padding-right: 0;
  }
}

/* line 85, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
.compapy_info .man_thumb img {
  width: 100%;
}

/* line 89, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
.compapy_info .company_info {
  margin-bottom: 30px;
  margin-top: 29px;
  padding-left: 45px;
}

@media (max-width: 767px) {
  /* line 89, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
  .compapy_info .company_info {
    padding-left: 0;
    margin-top: 0;
  }
}

/* line 97, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
.compapy_info .company_info h3 {
  font-size: 40px;
  line-height: 36px;
  color: #001D38;
  font-weight: 400;
}

@media (max-width: 767px) {
  /* line 97, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
  .compapy_info .company_info h3 {
    font-size: 21px;
    line-height: 36px;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 97, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
  .compapy_info .company_info h3 {
    font-size: 25px;
    line-height: 36px;
  }
}

@media (max-width: 767px) {
  /* line 110, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
  .compapy_info .company_info h3 br {
    display: none;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 110, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
  .compapy_info .company_info h3 br {
    display: none;
  }
}

/* line 119, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_service.scss */
.compapy_info .company_info p {
  color: #727272;
  font-size: 15px;
  font-weight: 400;
  line-height: 28px;
  margin-top: 21px;
  margin-bottom: 36px;
}

/* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_video.scss */
.video_area {
  padding-bottom: 60px;
  padding-top: 150px;
}

@media (max-width: 767px) {
  /* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_video.scss */
  .video_area {
    padding-top: 50px;
  }
}

/* line 8, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_video.scss */
.video_area .video_wrap .thumb {
  margin-bottom: 70px;
  position: relative;
}

/* line 11, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_video.scss */
.video_area .video_wrap .thumb img {
  width: 100%;
}

/* line 14, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_video.scss */
.video_area .video_wrap .thumb .video_icon a {
  width: 90px;
  height: 90px;
  background: #615CFD;
  display: inline-block;
  text-align: center;
  line-height: 90px;
  border-radius: 50%;
  color: #fff;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

@media (max-width: 767px) {
  /* line 14, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_video.scss */
  .video_area .video_wrap .thumb .video_icon a {
    width: 50px;
    height: 50px;
    line-height: 47px;
  }
}

/* line 32, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_video.scss */
.video_area .video_wrap .thumb .video_icon a i {
  font-size: 16px;
}

@media (max-width: 767px) {
  /* line 32, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_video.scss */
  .video_area .video_wrap .thumb .video_icon a i {
    font-size: 13px;
  }
}

/* line 42, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_video.scss */
.video_area .video_wrap .video_text p {
  font-size: 30px;
  font-weight: 600;
  line-height: 42px;
  color: #001D38;
}

@media (max-width: 767px) {
  /* line 42, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_video.scss */
  .video_area .video_wrap .video_text p {
    font-size: 18px;
    line-height: 25px;
  }
}

@media (min-width: 320px) and (max-width: 991px) {
  /* line 51, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_video.scss */
  .video_area .video_wrap .video_text p br {
    display: none;
  }
}

/* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_portfolio.scss */
.portfolio_area {
  background-image: url(../img/banner/portfolio_bg.png);
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
  position: relative;
  padding-top: 180px;
  padding-bottom: 340px;
}

@media (max-width: 767px) {
  /* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_portfolio.scss */
  .portfolio_area {
    padding-top: 60px;
  }
}

/* line 13, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_portfolio.scss */
.portfolio_area:before {
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  background: #001D38;
  content: '';
}

/* line 25, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_portfolio.scss */
.portfolio_image_area {
  padding-bottom: 75px;
  position: relative;
  margin-top: -295px;
}

/* line 29, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_portfolio.scss */
.portfolio_image_area.dec_margin {
  margin-top: 0;
  padding-top: 150px;
  padding-bottom: 150px;
}

@media (max-width: 767px) {
  /* line 29, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_portfolio.scss */
  .portfolio_image_area.dec_margin {
    padding: 50px 0;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 29, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_portfolio.scss */
  .portfolio_image_area.dec_margin {
    padding: 70px 0;
  }
}

@media (min-width: 992px) and (max-width: 1200px) {
  /* line 29, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_portfolio.scss */
  .portfolio_image_area.dec_margin {
    padding: 100px 0;
  }
}

/* line 43, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_portfolio.scss */
.portfolio_image_area .single_Portfolio {
  position: relative;
  margin-bottom: 20px;
  overflow: hidden;
}

/* line 47, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_portfolio.scss */
.portfolio_image_area .single_Portfolio .portfolio_thumb {
  height: 410px;
}

/* line 49, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_portfolio.scss */
.portfolio_image_area .single_Portfolio .portfolio_thumb img {
  width: 100%;
  height: 100%;
}

/* line 54, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_portfolio.scss */
.portfolio_image_area .single_Portfolio .portfolio_hover {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  text-align: center;
  background: rgba(97, 92, 253, 0.6);
  -webkit-transform: translateX(-50%);
  -moz-transform: translateX(-50%);
  -ms-transform: translateX(-50%);
  transform: translateX(-50%);
  -webkit-transition: 0.5s;
  -moz-transition: 0.5s;
  -o-transition: 0.5s;
  transition: 0.5s;
  opacity: 0;
  overflow: hidden;
}

/* line 66, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_portfolio.scss */
.portfolio_image_area .single_Portfolio .portfolio_hover .title {
  position: absolute;
  top: 50%;
  left: 0;
  right: 0;
  text-align: center;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}

/* line 74, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_portfolio.scss */
.portfolio_image_area .single_Portfolio .portfolio_hover h3 {
  color: #fff;
  font-size: 24px;
  font-weight: 700;
}

/* line 80, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_portfolio.scss */
.portfolio_image_area .single_Portfolio:hover .portfolio_hover {
  -webkit-transform: translateX(0%);
  -moz-transform: translateX(0%);
  -ms-transform: translateX(0%);
  transform: translateX(0%);
  opacity: 1;
}

/* line 85, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_portfolio.scss */
.portfolio_image_area .more_portfolio {
  margin-top: 60px;
}

/* line 2, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion.scss */
#accordion button {
  font-size: 16px;
  color: #0f2137;
  font-weight: 500;
  font-weight: 500;
}

@media (max-width: 767px) {
  /* line 2, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion.scss */
  #accordion button {
    font-size: 14px;
  }
}

/* line 11, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion.scss */
#accordion .card {
  margin-bottom: 15px;
  border-radius: 0;
  border-radius: 0 !important;
  margin-bottom: 30px;
}

/* line 16, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion.scss */
#accordion .card .card-header {
  background-color: transparent;
  padding: 4px 14px;
}

@media (max-width: 767px) {
  /* line 16, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion.scss */
  #accordion .card .card-header {
    padding: 4px 0;
  }
}

/* line 23, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion.scss */
#accordion .card .card-body {
  font-size: 16px;
  line-height: 28px;
  color: #888888;
  padding: 10px 30px 32px;
}

/* line 29, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion.scss */
#accordion .card .collapse {
  border-bottom: 1px solid #d7dbe3;
}

/* line 31, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion.scss */
#accordion .card .collapse.show {
  border-bottom: 1px solid transparent;
}

/* line 39, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion.scss */
#accordion h5 {
  position: relative;
  z-index: 1;
}

/* line 65, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion.scss */
#accordion h5 button.btn.btn-link:after {
  position: absolute;
  content: "\e648";
  top: 9px;
  right: 12px;
  height: auto;
  font-family: 'themify';
  color: #0f2137;
  font-size: 14px;
  left: -24px;
}

@media (max-width: 767px) {
  /* line 65, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion.scss */
  #accordion h5 button.btn.btn-link:after {
    right: 10px;
  }
}

/* line 81, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion.scss */
#accordion h5 button.btn.btn-link.collapsed:after {
  content: "\e64b";
  color: #0f2137;
  font-size: 14px;
}

/* line 88, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion.scss */
#accordion h5 button i {
  height: 36px;
  width: 36px;
  font-size: 14px;
  display: inline-block;
  text-align: center;
  line-height: 36px;
  border-radius: 50%;
  margin-right: 20px;
  color: #fff;
  -webkit-transition: 0.3s;
  -moz-transition: 0.3s;
  -o-transition: 0.3s;
  transition: 0.3s;
}

@media (max-width: 767px) {
  /* line 88, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion.scss */
  #accordion h5 button i {
    display: none;
  }
}

/* line 104, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion.scss */
#accordion h5 button.btn.btn-link.collapsed i {
  background: #f4f7f9;
  color: #0f2137;
}

@media (max-width: 767px) {
  /* line 104, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion.scss */
  #accordion h5 button.btn.btn-link.collapsed i {
    display: none;
  }
}

/* line 116, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion.scss */
#accordion .btn-link:hover {
  color: #182028;
  text-decoration: none;
}

/* line 120, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion.scss */
#accordion .btn {
  text-align: left !important;
}

/* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion_area.scss */
.accordion_area {
  padding-top: 100px;
  padding-bottom: 100px;
}

/* line 4, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion_area.scss */
.accordion_area .accordion_thumb {
  -webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  border-radius: 10px;
  overflow: hidden;
}

/* line 7, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion_area.scss */
.accordion_area .accordion_thumb img {
  width: 100%;
}

/* line 12, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion_area.scss */
.accordion_area .faq_ask h3 {
  font-size: 46px;
  font-weight: 300;
  color: #001D38;
  margin-bottom: 57px;
}

@media (max-width: 767px) {
  /* line 12, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion_area.scss */
  .accordion_area .faq_ask h3 {
    font-size: 38px;
    margin-bottom: 50px;
    margin-top: 20px;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  /* line 12, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion_area.scss */
  .accordion_area .faq_ask h3 {
    font-size: 38px;
    margin-bottom: 50px;
    margin-top: 20px;
  }
}

/* line 29, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion_area.scss */
.accordion_area .faq_ask #accordion .card {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: none;
  border-radius: .25rem;
  border-bottom: 1px solid #E8E8E8;
}

/* line 46, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion_area.scss */
.accordion_area .faq_ask #accordion .card .card-header {
  background-color: transparent;
  padding: 4px 14px;
  border: none;
}

/* line 51, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion_area.scss */
.accordion_area .faq_ask #accordion button {
  font-size: 15px;
  color: #001D38 !important;
  font-weight: 300 !important;
}

@media (max-width: 767px) {
  /* line 55, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion_area.scss */
  .accordion_area .faq_ask #accordion button span {
    display: none;
  }
}

/* line 61, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion_area.scss */
.accordion_area .faq_ask #accordion .card .card-header {
  background-color: transparent;
  padding: 4px 30px;
}

/* line 75, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion_area.scss */
.accordion_area .faq_ask #accordion .card .card-body {
  font-size: 15px;
  line-height: 28px;
  color: #727272;
  padding: 10px 30px 32px;
  font-weight: 400;
  line-height: 28px;
}

/* line 85, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_accordion_area.scss */
.accordion_area .faq_ask #accordion .btn-link.focus, .accordion_area .faq_ask #accordion .btn-link:focus {
  text-decoration: none;
  border-color: transparent;
  box-shadow: none;
}

/* line 1, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_bg_1 {
  background-image: url(../img/banner/study_banner.png);
  background-size: 100% 100%;
}

/* line 5, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area {
  position: relative;
  padding: 190px 0 216px 0;
  position: relative;
  position: relative;
}

@media (max-width: 767px) {
  /* line 5, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
  .case_study_area {
    padding: 120px 0 120px 0;
  }
}

/* line 15, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area.white_case_study {
  padding: 0px 0 200px 0;
}

/* line 17, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area.white_case_study.study_page {
  padding-top: 93px;
  padding-bottom: 140px;
}

@media (max-width: 767px) {
  /* line 17, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
  .case_study_area.white_case_study.study_page {
    padding: 40px 0;
  }
}

/* line 23, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area.white_case_study.study_page .details_title h3 {
  font-size: 40px;
  font-weight: 400;
  line-height: 52px;
  color: #001D38;
  margin-bottom: 40px;
}

@media (max-width: 767px) {
  /* line 23, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
  .case_study_area.white_case_study.study_page .details_title h3 {
    font-size: 30px;
    line-height: 40px;
  }
}

/* line 36, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area .patrn_1 {
  position: absolute;
  left: 0;
  top: 0;
}

/* line 41, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area .patrn_2 {
  position: absolute;
  right: 0;
  bottom: 0;
}

/* line 46, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area .single_study {
  -webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  border-radius: 10px;
  margin-bottom: 60px;
  overflow: hidden;
}

/* line 50, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area .single_study.white_single_study {
  overflow: visible;
}

/* line 53, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area .single_study .thumb {
  border-top-right-radius: 10px;
  border-top-left-radius: 10px;
  overflow: hidden;
}

/* line 57, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area .single_study .thumb img {
  width: 100%;
  border-top-right-radius: 10px;
  border-top-left-radius: 10px;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
  -webkit-transition: 0.3s;
  -moz-transition: 0.3s;
  -o-transition: 0.3s;
  transition: 0.3s;
}

/* line 65, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area .single_study .subheading {
  background: #0A2640;
  padding: 31px 0;
  -webkit-transition: 0.3s;
  -moz-transition: 0.3s;
  -o-transition: 0.3s;
  transition: 0.3s;
}

/* line 69, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area .single_study .subheading h4 {
  margin-bottom: 6px;
  color: #fff;
  font-size: 22px;
  font-weight: 400;
}

/* line 75, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area .single_study .subheading h4 a:hover {
  color: #FF008C;
}

/* line 80, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area .single_study .subheading p {
  color: #798896;
  margin-bottom: 0;
}

/* line 84, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area .single_study .subheading.white_subheading {
  background: #fff;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.04);
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
}

/* line 89, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area .single_study .subheading.white_subheading h4 {
  color: #001D38;
}

/* line 92, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area .single_study .subheading.white_subheading h4 a:hover {
  color: #FF008C;
}

/* line 97, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area .single_study .subheading.white_subheading p {
  color: #919191;
  margin-bottom: 0;
}

/* line 105, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area .single_study:hover .thumb img {
  -webkit-transform: scale(1.2);
  -moz-transform: scale(1.2);
  -ms-transform: scale(1.2);
  transform: scale(1.2);
}

/* line 108, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area .single_study:hover .subheading {
  background: #1A344C;
}

/* line 110, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area .single_study:hover .subheading.white_subheading {
  background: #fff;
}

/* line 116, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area .owl-dots {
  position: absolute;
  -webkit-transform: translateX(-50%);
  -moz-transform: translateX(-50%);
  -ms-transform: translateX(-50%);
  transform: translateX(-50%);
  left: 50%;
}

/* line 122, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area .owl-dots div {
  width: 13px;
  height: 13px;
  background: #334A60;
  display: inline-block;
  margin: 0 2px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
}

/* line 129, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area .owl-dots div.active {
  width: 27px;
  background: #808E9C;
  -webkit-border-radius: 30px;
  -moz-border-radius: 30px;
  border-radius: 30px;
}

/* line 135, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area .load_more {
  margin-top: 40px;
}

/* line 137, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area .load_more .load_more_btn {
  display: inline-block;
  color: #FF008C;
  background: #FFF5FB;
  -webkit-border-radius: 30px;
  -moz-border-radius: 30px;
  border-radius: 30px;
  padding: 13px 35px;
  font-size: 15px;
  font-weight: 500;
}

/* line 145, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_case_study.scss */
.case_study_area .load_more .load_more_btn:hover {
  background: #FF008C;
  color: #fff;
}

/*=================== contact banner start ====================*/
/* line 3, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
.dropdown .dropdown-menu {
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  -ms-transition: all 0.3s;
  -o-transition: all 0.3s;
  transition: all 0.3s;
}

/* line 10, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
.contact-info {
  margin-bottom: 25px;
}

/* line 13, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
.contact-info__icon {
  margin-right: 20px;
}

/* line 16, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
.contact-info__icon i, .contact-info__icon span {
  color: #8f9195;
  font-size: 27px;
}

/* line 24, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
.contact-info .media-body h3 {
  font-size: 16px;
  margin-bottom: 0;
  font-size: 16px;
  color: #2a2a2a;
}

/* line 30, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
.contact-info .media-body h3 a:hover {
  color: #ff5e13;
}

/* line 36, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
.contact-info .media-body p {
  color: #8a8a8a;
}

/*=================== contact banner end ====================*/
/*=================== contact form start ====================*/
/* line 45, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
.contact-title {
  font-size: 27px;
  font-weight: 600;
  margin-bottom: 20px;
}

/* line 53, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
.form-contact label {
  font-size: 14px;
}

/* line 57, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
.form-contact .form-group {
  margin-bottom: 30px;
}

/* line 61, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
.form-contact .form-control {
  border: 1px solid #e5e6e9;
  border-radius: 0px;
  height: 48px;
  padding-left: 18px;
  font-size: 13px;
  background: transparent;
}

/* line 69, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
.form-contact .form-control:focus {
  outline: 0;
  box-shadow: none;
}

/* line 74, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
.form-contact .form-control::placeholder {
  font-weight: 300;
  color: #999999;
}

/* line 80, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
.form-contact textarea {
  border-radius: 0px;
  height: 100% !important;
}

/*=================== contact form end ====================*/
/* Contact Success and error Area css
============================================================================================ */
/* line 97, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
.modal-message .modal-dialog {
  position: absolute;
  top: 36%;
  left: 50%;
  transform: translateX(-50%) translateY(-50%) !important;
  margin: 0px;
  max-width: 500px;
  width: 100%;
}

/* line 106, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
.modal-message .modal-dialog .modal-content .modal-header {
  text-align: center;
  display: block;
  border-bottom: none;
  padding-top: 50px;
  padding-bottom: 50px;
}

/* line 112, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
.modal-message .modal-dialog .modal-content .modal-header .close {
  position: absolute;
  right: -15px;
  top: -15px;
  padding: 0px;
  color: #fff;
  opacity: 1;
  cursor: pointer;
}

/* line 121, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
.modal-message .modal-dialog .modal-content .modal-header h2 {
  display: block;
  text-align: center;
  padding-bottom: 10px;
}

/* line 126, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
.modal-message .modal-dialog .modal-content .modal-header p {
  display: block;
}

/* line 133, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
.contact-section {
  padding: 130px 0 100px;
}

@media (max-width: 991px) {
  /* line 133, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
  .contact-section {
    padding: 70px 0 40px;
  }
}

@media only screen and (min-width: 992px) and (max-width: 1200px) {
  /* line 133, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
  .contact-section {
    padding: 80px 0 50px;
  }
}

/* line 141, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
.contact-section .btn_2 {
  background-color: #191d34;
  padding: 18px 60px;
  border-radius: 50px;
  margin-top: 0;
}

/* line 146, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_contact.scss */
.contact-section .btn_2:hover {
  background-color: #ff5e13;
}

/* line 75, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.sample-text-area {
  background: #fff;
  padding: 100px 0 70px 0;
}

/* line 80, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.text-heading {
  margin-bottom: 30px;
  font-size: 24px;
}

/* line 85, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
b,
sup,
sub,
u,
del {
  color: #ff5e13;
}

/* line 93, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
h1 {
  font-size: 36px;
}

/* line 97, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
h2 {
  font-size: 30px;
}

/* line 101, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
h3 {
  font-size: 18px;
}

/* line 105, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
h4 {
  font-size: 18px;
}

/* line 109, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
h5 {
  font-size: 16px;
}

/* line 113, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
h6 {
  font-size: 14px;
}

/* line 117, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
h1,
h2,
h3,
h4,
h5,
h6 {
  line-height: 1.2em;
}

/* line 127, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.typography h1,
.typography h2,
.typography h3,
.typography h4,
.typography h5,
.typography h6 {
  color: #828bb2;
}

/* line 137, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.button-area {
  background: #fff;
}

/* line 138, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.button-area .border-top-generic {
  padding: 70px 15px;
  border-top: 1px dotted #eee;
}

/* line 146, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.button-group-area .genric-btn {
  margin-right: 10px;
  margin-top: 10px;
}

/* line 149, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.button-group-area .genric-btn:last-child {
  margin-right: 0;
}

/* line 155, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn {
  display: inline-block;
  outline: none;
  line-height: 40px;
  padding: 0 30px;
  font-size: .8em;
  text-align: center;
  text-decoration: none;
  font-weight: 500;
  cursor: pointer;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
}

/* line 166, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn:focus {
  outline: none;
}

/* line 169, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.e-large {
  padding: 0 40px;
  line-height: 50px;
}

/* line 173, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.large {
  line-height: 45px;
}

/* line 176, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.medium {
  line-height: 30px;
}

/* line 179, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.small {
  line-height: 25px;
}

/* line 182, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.radius {
  border-radius: 3px;
}

/* line 185, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.circle {
  border-radius: 20px;
}

/* line 188, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.arrow {
  display: -webkit-inline-box;
  display: -ms-inline-flexbox;
  display: inline-flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}

/* line 195, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.arrow span {
  margin-left: 10px;
}

/* line 199, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.default {
  color: #415094;
  background: #f9f9ff;
  border: 1px solid transparent;
}

/* line 203, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.default:hover {
  border: 1px solid #f9f9ff;
  background: #fff;
}

/* line 208, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.default-border {
  border: 1px solid #f9f9ff;
  background: #fff;
}

/* line 211, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.default-border:hover {
  color: #415094;
  background: #f9f9ff;
  border: 1px solid transparent;
}

/* line 217, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.primary {
  color: #fff;
  background: #ff5e13;
  border: 1px solid transparent;
}

/* line 221, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.primary:hover {
  color: #ff5e13;
  border: 1px solid #ff5e13;
  background: #fff;
}

/* line 227, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.primary-border {
  color: #ff5e13;
  border: 1px solid #ff5e13;
  background: #fff;
}

/* line 231, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.primary-border:hover {
  color: #fff;
  background: #ff5e13;
  border: 1px solid transparent;
}

/* line 237, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.success {
  color: #fff;
  background: #4cd3e3;
  border: 1px solid transparent;
}

/* line 241, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.success:hover {
  color: #4cd3e3;
  border: 1px solid #4cd3e3;
  background: #fff;
}

/* line 247, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.success-border {
  color: #4cd3e3;
  border: 1px solid #4cd3e3;
  background: #fff;
}

/* line 251, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.success-border:hover {
  color: #fff;
  background: #4cd3e3;
  border: 1px solid transparent;
}

/* line 257, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.info {
  color: #fff;
  background: #38a4ff;
  border: 1px solid transparent;
}

/* line 261, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.info:hover {
  color: #38a4ff;
  border: 1px solid #38a4ff;
  background: #fff;
}

/* line 267, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.info-border {
  color: #38a4ff;
  border: 1px solid #38a4ff;
  background: #fff;
}

/* line 271, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.info-border:hover {
  color: #fff;
  background: #38a4ff;
  border: 1px solid transparent;
}

/* line 277, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.warning {
  color: #fff;
  background: #f4e700;
  border: 1px solid transparent;
}

/* line 281, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.warning:hover {
  color: #f4e700;
  border: 1px solid #f4e700;
  background: #fff;
}

/* line 287, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.warning-border {
  color: #f4e700;
  border: 1px solid #f4e700;
  background: #fff;
}

/* line 291, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.warning-border:hover {
  color: #fff;
  background: #f4e700;
  border: 1px solid transparent;
}

/* line 297, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.danger {
  color: #fff;
  background: #f44a40;
  border: 1px solid transparent;
}

/* line 301, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.danger:hover {
  color: #f44a40;
  border: 1px solid #f44a40;
  background: #fff;
}

/* line 307, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.danger-border {
  color: #f44a40;
  border: 1px solid #f44a40;
  background: #fff;
}

/* line 311, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.danger-border:hover {
  color: #fff;
  background: #f44a40;
  border: 1px solid transparent;
}

/* line 317, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.link {
  color: #415094;
  background: #f9f9ff;
  text-decoration: underline;
  border: 1px solid transparent;
}

/* line 322, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.link:hover {
  color: #415094;
  border: 1px solid #f9f9ff;
  background: #fff;
}

/* line 328, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.link-border {
  color: #415094;
  border: 1px solid #f9f9ff;
  background: #fff;
  text-decoration: underline;
}

/* line 333, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.link-border:hover {
  color: #415094;
  background: #f9f9ff;
  border: 1px solid transparent;
}

/* line 339, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.genric-btn.disable {
  color: #222222, 0.3;
  background: #f9f9ff;
  border: 1px solid transparent;
  cursor: not-allowed;
}

/* line 347, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.generic-blockquote {
  padding: 30px 50px 30px 30px;
  background: #f9f9ff;
  border-left: 2px solid #ff5e13;
}

/* line 353, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.progress-table-wrap {
  overflow-x: scroll;
}

/* line 357, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.progress-table {
  background: #f9f9ff;
  padding: 15px 0px 30px 0px;
  min-width: 800px;
}

/* line 361, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.progress-table .serial {
  width: 11.83%;
  padding-left: 30px;
}

/* line 365, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.progress-table .country {
  width: 28.07%;
}

/* line 368, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.progress-table .visit {
  width: 19.74%;
}

/* line 371, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.progress-table .percentage {
  width: 40.36%;
  padding-right: 50px;
}

/* line 375, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.progress-table .table-head {
  display: flex;
}

/* line 377, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.progress-table .table-head .serial,
.progress-table .table-head .country,
.progress-table .table-head .visit,
.progress-table .table-head .percentage {
  color: #415094;
  line-height: 40px;
  text-transform: uppercase;
  font-weight: 500;
}

/* line 387, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.progress-table .table-row {
  padding: 15px 0;
  border-top: 1px solid #edf3fd;
  display: flex;
}

/* line 391, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.progress-table .table-row .serial,
.progress-table .table-row .country,
.progress-table .table-row .visit,
.progress-table .table-row .percentage {
  display: flex;
  align-items: center;
}

/* line 399, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.progress-table .table-row .country img {
  margin-right: 15px;
}

/* line 404, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.progress-table .table-row .percentage .progress {
  width: 80%;
  border-radius: 0px;
  background: transparent;
}

/* line 408, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.progress-table .table-row .percentage .progress .progress-bar {
  height: 5px;
  line-height: 5px;
}

/* line 411, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.progress-table .table-row .percentage .progress .progress-bar.color-1 {
  background-color: #6382e6;
}

/* line 414, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.progress-table .table-row .percentage .progress .progress-bar.color-2 {
  background-color: #e66686;
}

/* line 417, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.progress-table .table-row .percentage .progress .progress-bar.color-3 {
  background-color: #f09359;
}

/* line 420, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.progress-table .table-row .percentage .progress .progress-bar.color-4 {
  background-color: #73fbaf;
}

/* line 423, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.progress-table .table-row .percentage .progress .progress-bar.color-5 {
  background-color: #73fbaf;
}

/* line 426, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.progress-table .table-row .percentage .progress .progress-bar.color-6 {
  background-color: #6382e6;
}

/* line 429, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.progress-table .table-row .percentage .progress .progress-bar.color-7 {
  background-color: #a367e7;
}

/* line 432, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.progress-table .table-row .percentage .progress .progress-bar.color-8 {
  background-color: #e66686;
}

/* line 441, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.single-gallery-image {
  margin-top: 30px;
  background-repeat: no-repeat !important;
  background-position: center center !important;
  background-size: cover !important;
  height: 200px;
}

/* line 449, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.list-style {
  width: 14px;
  height: 14px;
}

/* line 455, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.unordered-list li {
  position: relative;
  padding-left: 30px;
  line-height: 1.82em !important;
}

/* line 459, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.unordered-list li:before {
  content: "";
  position: absolute;
  width: 14px;
  height: 14px;
  border: 3px solid #ff5e13;
  background: #fff;
  top: 4px;
  left: 0;
  border-radius: 50%;
}

/* line 473, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.ordered-list {
  margin-left: 30px;
}

/* line 475, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.ordered-list li {
  list-style-type: decimal-leading-zero;
  color: #ff5e13;
  font-weight: 500;
  line-height: 1.82em !important;
}

/* line 480, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.ordered-list li span {
  font-weight: 300;
  color: #828bb2;
}

/* line 488, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.ordered-list-alpha li {
  margin-left: 30px;
  list-style-type: lower-alpha;
  color: #ff5e13;
  font-weight: 500;
  line-height: 1.82em !important;
}

/* line 494, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.ordered-list-alpha li span {
  font-weight: 300;
  color: #828bb2;
}

/* line 502, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.ordered-list-roman li {
  margin-left: 30px;
  list-style-type: lower-roman;
  color: #ff5e13;
  font-weight: 500;
  line-height: 1.82em !important;
}

/* line 508, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.ordered-list-roman li span {
  font-weight: 300;
  color: #828bb2;
}

/* line 515, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.single-input {
  display: block;
  width: 100%;
  line-height: 40px;
  border: none;
  outline: none;
  background: #f9f9ff;
  padding: 0 20px;
}

/* line 523, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.single-input:focus {
  outline: none;
}

/* line 528, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.input-group-icon {
  position: relative;
}

/* line 530, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.input-group-icon .icon {
  position: absolute;
  left: 20px;
  top: 0;
  line-height: 40px;
  z-index: 3;
}

/* line 535, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.input-group-icon .icon i {
  color: #797979;
}

/* line 540, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.input-group-icon .single-input {
  padding-left: 45px;
}

/* line 545, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.single-textarea {
  display: block;
  width: 100%;
  line-height: 40px;
  border: none;
  outline: none;
  background: #f9f9ff;
  padding: 0 20px;
  height: 100px;
  resize: none;
}

/* line 555, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.single-textarea:focus {
  outline: none;
}

/* line 560, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.single-input-primary {
  display: block;
  width: 100%;
  line-height: 40px;
  border: 1px solid transparent;
  outline: none;
  background: #f9f9ff;
  padding: 0 20px;
}

/* line 568, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.single-input-primary:focus {
  outline: none;
  border: 1px solid #ff5e13;
}

/* line 574, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.single-input-accent {
  display: block;
  width: 100%;
  line-height: 40px;
  border: 1px solid transparent;
  outline: none;
  background: #f9f9ff;
  padding: 0 20px;
}

/* line 582, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.single-input-accent:focus {
  outline: none;
  border: 1px solid #eb6b55;
}

/* line 588, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.single-input-secondary {
  display: block;
  width: 100%;
  line-height: 40px;
  border: 1px solid transparent;
  outline: none;
  background: #f9f9ff;
  padding: 0 20px;
}

/* line 596, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.single-input-secondary:focus {
  outline: none;
  border: 1px solid #f09359;
}

/* line 602, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.default-switch {
  width: 35px;
  height: 17px;
  border-radius: 8.5px;
  background: #f9f9ff;
  position: relative;
  cursor: pointer;
}

/* line 609, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.default-switch input {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  cursor: pointer;
}

/* line 619, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.default-switch input + label {
  position: absolute;
  top: 1px;
  left: 1px;
  width: 15px;
  height: 15px;
  border-radius: 50%;
  background: #ff5e13;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -o-transition: all 0.2s;
  transition: all 0.2s;
  box-shadow: 0px 4px 5px 0px rgba(0, 0, 0, 0.2);
  cursor: pointer;
}

/* line 632, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.default-switch input:checked + label {
  left: 19px;
}

/* line 639, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.primary-switch {
  width: 35px;
  height: 17px;
  border-radius: 8.5px;
  background: #f9f9ff;
  position: relative;
  cursor: pointer;
}

/* line 646, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.primary-switch input {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
}

/* line 655, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.primary-switch input + label {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
}

/* line 663, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.primary-switch input + label:before {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  background: transparent;
  border-radius: 8.5px;
  cursor: pointer;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -o-transition: all 0.2s;
  transition: all 0.2s;
}

/* line 677, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.primary-switch input + label:after {
  content: "";
  position: absolute;
  top: 1px;
  left: 1px;
  width: 15px;
  height: 15px;
  border-radius: 50%;
  background: #fff;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -o-transition: all 0.2s;
  transition: all 0.2s;
  box-shadow: 0px 4px 5px 0px rgba(0, 0, 0, 0.2);
  cursor: pointer;
}

/* line 693, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.primary-switch input:checked + label:after {
  left: 19px;
}

/* line 696, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.primary-switch input:checked + label:before {
  background: #ff5e13;
}

/* line 704, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.confirm-switch {
  width: 35px;
  height: 17px;
  border-radius: 8.5px;
  background: #f9f9ff;
  position: relative;
  cursor: pointer;
}

/* line 711, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.confirm-switch input {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
}

/* line 720, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.confirm-switch input + label {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
}

/* line 728, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.confirm-switch input + label:before {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  background: transparent;
  border-radius: 8.5px;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -o-transition: all 0.2s;
  transition: all 0.2s;
  cursor: pointer;
}

/* line 742, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.confirm-switch input + label:after {
  content: "";
  position: absolute;
  top: 1px;
  left: 1px;
  width: 15px;
  height: 15px;
  border-radius: 50%;
  background: #fff;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -o-transition: all 0.2s;
  transition: all 0.2s;
  box-shadow: 0px 4px 5px 0px rgba(0, 0, 0, 0.2);
  cursor: pointer;
}

/* line 758, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.confirm-switch input:checked + label:after {
  left: 19px;
}

/* line 761, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.confirm-switch input:checked + label:before {
  background: #4cd3e3;
}

/* line 769, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.primary-checkbox {
  width: 16px;
  height: 16px;
  border-radius: 3px;
  background: #f9f9ff;
  position: relative;
  cursor: pointer;
}

/* line 776, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.primary-checkbox input {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
}

/* line 785, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.primary-checkbox input + label {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  border-radius: 3px;
  cursor: pointer;
  border: 1px solid #f1f1f1;
}

/* line 798, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.primary-checkbox input:checked + label {
  background: url(../img/elements/primary-check.png) no-repeat center center/cover;
  border: none;
}

/* line 806, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.confirm-checkbox {
  width: 16px;
  height: 16px;
  border-radius: 3px;
  background: #f9f9ff;
  position: relative;
  cursor: pointer;
}

/* line 813, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.confirm-checkbox input {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
}

/* line 822, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.confirm-checkbox input + label {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  border-radius: 3px;
  cursor: pointer;
  border: 1px solid #f1f1f1;
}

/* line 835, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.confirm-checkbox input:checked + label {
  background: url(../img/elements/success-check.png) no-repeat center center/cover;
  border: none;
}

/* line 843, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.disabled-checkbox {
  width: 16px;
  height: 16px;
  border-radius: 3px;
  background: #f9f9ff;
  position: relative;
  cursor: pointer;
}

/* line 850, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.disabled-checkbox input {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
}

/* line 859, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.disabled-checkbox input + label {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  border-radius: 3px;
  cursor: pointer;
  border: 1px solid #f1f1f1;
}

/* line 871, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.disabled-checkbox input:disabled {
  cursor: not-allowed;
  z-index: 3;
}

/* line 876, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.disabled-checkbox input:checked + label {
  background: url(../img/elements/disabled-check.png) no-repeat center center/cover;
  border: none;
}

/* line 884, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.primary-radio {
  width: 16px;
  height: 16px;
  border-radius: 8px;
  background: #f9f9ff;
  position: relative;
  cursor: pointer;
}

/* line 891, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.primary-radio input {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
}

/* line 900, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.primary-radio input + label {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  border-radius: 8px;
  cursor: pointer;
  border: 1px solid #f1f1f1;
}

/* line 913, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.primary-radio input:checked + label {
  background: url(../img/elements/primary-radio.png) no-repeat center center/cover;
  border: none;
}

/* line 921, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.confirm-radio {
  width: 16px;
  height: 16px;
  border-radius: 8px;
  background: #f9f9ff;
  position: relative;
  cursor: pointer;
}

/* line 928, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.confirm-radio input {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
}

/* line 937, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.confirm-radio input + label {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  border-radius: 8px;
  cursor: pointer;
  border: 1px solid #f1f1f1;
}

/* line 950, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.confirm-radio input:checked + label {
  background: url(../img/elements/success-radio.png) no-repeat center center/cover;
  border: none;
}

/* line 958, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.disabled-radio {
  width: 16px;
  height: 16px;
  border-radius: 8px;
  background: #f9f9ff;
  position: relative;
  cursor: pointer;
}

/* line 965, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.disabled-radio input {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
}

/* line 974, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.disabled-radio input + label {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  border-radius: 8px;
  cursor: pointer;
  border: 1px solid #f1f1f1;
}

/* line 986, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.disabled-radio input:disabled {
  cursor: not-allowed;
  z-index: 3;
}

/* line 991, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.disabled-radio input:checked + label {
  background: url(../img/elements/disabled-radio.png) no-repeat center center/cover;
  border: none;
}

/* line 999, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.default-select {
  height: 40px;
}

/* line 1001, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.default-select .nice-select {
  border: none;
  border-radius: 0px;
  height: 40px;
  background: #f9f9ff;
  padding-left: 20px;
  padding-right: 40px;
}

/* line 1008, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.default-select .nice-select .list {
  margin-top: 0;
  border: none;
  border-radius: 0px;
  box-shadow: none;
  width: 100%;
  padding: 10px 0 10px 0px;
}

/* line 1015, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.default-select .nice-select .list .option {
  font-weight: 300;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
  line-height: 28px;
  min-height: 28px;
  font-size: 12px;
  padding-left: 20px;
}

/* line 1022, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.default-select .nice-select .list .option.selected {
  color: #ff5e13;
  background: transparent;
}

/* line 1026, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.default-select .nice-select .list .option:hover {
  color: #ff5e13;
  background: transparent;
}

/* line 1033, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.default-select .current {
  margin-right: 50px;
  font-weight: 300;
}

/* line 1037, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.default-select .nice-select::after {
  right: 20px;
}

/* line 1042, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.form-select {
  height: 40px;
  width: 100%;
}

/* line 1045, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.form-select .nice-select {
  border: none;
  border-radius: 0px;
  height: 40px;
  background: #f9f9ff;
  padding-left: 45px;
  padding-right: 40px;
  width: 100%;
}

/* line 1053, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.form-select .nice-select .list {
  margin-top: 0;
  border: none;
  border-radius: 0px;
  box-shadow: none;
  width: 100%;
  padding: 10px 0 10px 0px;
}

/* line 1060, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.form-select .nice-select .list .option {
  font-weight: 300;
  -webkit-transition: all 0.3s ease 0s;
  -moz-transition: all 0.3s ease 0s;
  -o-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
  line-height: 28px;
  min-height: 28px;
  font-size: 12px;
  padding-left: 45px;
}

/* line 1067, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.form-select .nice-select .list .option.selected {
  color: #ff5e13;
  background: transparent;
}

/* line 1071, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.form-select .nice-select .list .option:hover {
  color: #ff5e13;
  background: transparent;
}

/* line 1078, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.form-select .current {
  margin-right: 50px;
  font-weight: 300;
}

/* line 1082, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.form-select .nice-select::after {
  right: 20px;
}

/* line 1086, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.mt-10 {
  margin-top: 10px;
}

/* line 1089, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.section-top-border {
  padding: 50px 0;
  border-top: 1px dotted #eee;
}

/* line 1093, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.mb-30 {
  margin-bottom: 30px;
}

/* line 1096, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.mt-30 {
  margin-top: 30px;
}

/* line 1099, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_elements.scss */
.switch-wrap {
  margin-bottom: 10px;
}

/* Start Blog Area css
============================================================================================ */
/* line 5, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.latest-blog-area .area-heading {
  margin-bottom: 70px;
}

/* line 10, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_area a {
  color: #666666 !important;
  text-decoration: none;
  -webkit-transition: 0.5s;
  transition: 0.5s;
}

/* line 14, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_area a:hover, .blog_area a :hover {
  background: -webkit-linear-gradient(131deg, #FF008C 0%, #FF008C 99%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  text-decoration: none;
  -webkit-transition: 0.5s;
  transition: 0.5s;
}

/* line 24, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-blog {
  overflow: hidden;
  margin-bottom: 30px;
}

/* line 28, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-blog:hover {
  box-shadow: 0px 10px 20px 0px rgba(42, 34, 123, 0.1);
}

/* line 32, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-blog .thumb {
  overflow: hidden;
  position: relative;
}

/* line 36, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-blog .thumb:after {
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: #000;
  opacity: 0;
  -webkit-transition: 0.5s;
  transition: 0.5s;
}

/* line 49, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-blog h4 {
  border-bottom: 1px solid #dfdfdf;
  padding-bottom: 34px;
  margin-bottom: 25px;
}

/* line 56, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-blog a {
  font-size: 20px;
  font-weight: 600;
}

/* line 66, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-blog .date {
  color: #666666;
  text-align: left;
  display: inline-block;
  font-size: 13px;
  font-weight: 300;
}

/* line 74, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-blog .tag {
  text-align: left;
  display: inline-block;
  float: left;
  font-size: 13px;
  font-weight: 300;
  margin-right: 22px;
  position: relative;
}

/* line 84, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-blog .tag:after {
  content: '';
  position: absolute;
  width: 1px;
  height: 10px;
  background: #acacac;
  right: -12px;
  top: 7px;
}

@media (max-width: 1199px) {
  /* line 74, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .single-blog .tag {
    margin-right: 8px;
  }
  /* line 98, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .single-blog .tag:after {
    display: none;
  }
}

/* line 104, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-blog .likes {
  margin-right: 16px;
}

@media (max-width: 800px) {
  /* line 24, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .single-blog {
    margin-bottom: 30px;
  }
}

/* line 112, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-blog .single-blog-content {
  padding: 30px;
}

/* line 116, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-blog .single-blog-content .meta-bottom p {
  font-size: 13px;
  font-weight: 300;
}

/* line 121, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-blog .single-blog-content .meta-bottom i {
  color: #fdcb9e;
  font-size: 13px;
  margin-right: 7px;
}

@media (max-width: 1199px) {
  /* line 112, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .single-blog .single-blog-content {
    padding: 15px;
  }
}

/* line 135, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-blog:hover .thumb:after {
  opacity: .7;
  -webkit-transition: 0.5s;
  transition: 0.5s;
}

@media (max-width: 1199px) {
  /* line 143, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .single-blog h4 {
    transition: all 300ms linear 0s;
    border-bottom: 1px solid #dfdfdf;
    padding-bottom: 14px;
    margin-bottom: 12px;
  }
  /* line 149, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .single-blog h4 a {
    font-size: 18px;
  }
}

/* line 157, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.full_image.single-blog {
  position: relative;
}

/* line 160, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.full_image.single-blog .single-blog-content {
  position: absolute;
  left: 35px;
  bottom: 0;
  opacity: 0;
  visibility: hidden;
  -webkit-transition: 0.5s;
  transition: 0.5s;
}

@media (min-width: 992px) {
  /* line 160, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .full_image.single-blog .single-blog-content {
    bottom: 100px;
  }
}

/* line 179, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.full_image.single-blog h4 {
  -webkit-transition: 0.5s;
  transition: 0.5s;
  border-bottom: none;
  padding-bottom: 5px;
}

/* line 185, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.full_image.single-blog a {
  font-size: 20px;
  font-weight: 600;
}

/* line 195, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.full_image.single-blog .date {
  color: #fff;
}

/* line 200, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.full_image.single-blog:hover .single-blog-content {
  opacity: 1;
  visibility: visible;
  -webkit-transition: 0.5s;
  transition: 0.5s;
}

/* End Blog Area css
============================================================================================ */
/* Latest Blog Area css
============================================================================================ */
/* line 224, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.l_blog_item .l_blog_text .date {
  margin-top: 24px;
  margin-bottom: 15px;
}

/* line 228, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.l_blog_item .l_blog_text .date a {
  font-size: 12px;
}

/* line 234, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.l_blog_item .l_blog_text h4 {
  font-size: 18px;
  border-bottom: 1px solid #eeeeee;
  margin-bottom: 0px;
  padding-bottom: 20px;
  -webkit-transition: 0.5s;
  transition: 0.5s;
}

/* line 247, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.l_blog_item .l_blog_text p {
  margin-bottom: 0px;
  padding-top: 20px;
}

/* End Latest Blog Area css
============================================================================================ */
/* Causes Area css
============================================================================================ */
/* line 263, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.causes_slider .owl-dots {
  text-align: center;
  margin-top: 80px;
}

/* line 267, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.causes_slider .owl-dots .owl-dot {
  height: 14px;
  width: 14px;
  background: #eeeeee;
  display: inline-block;
  margin-right: 7px;
}

/* line 274, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.causes_slider .owl-dots .owl-dot:last-child {
  margin-right: 0px;
}

/* line 285, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.causes_item {
  background: #fff;
}

/* line 288, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.causes_item .causes_img {
  position: relative;
}

/* line 291, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.causes_item .causes_img .c_parcent {
  position: absolute;
  bottom: 0px;
  width: 100%;
  left: 0px;
  height: 3px;
  background: rgba(255, 255, 255, 0.5);
}

/* line 299, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.causes_item .causes_img .c_parcent span {
  width: 70%;
  height: 3px;
  position: absolute;
  left: 0px;
  bottom: 0px;
}

/* line 307, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.causes_item .causes_img .c_parcent span:before {
  content: "75%";
  position: absolute;
  right: -10px;
  bottom: 0px;
  color: #fff;
  padding: 0px 5px;
}

/* line 320, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.causes_item .causes_text {
  padding: 30px 35px 40px 30px;
}

/* line 323, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.causes_item .causes_text h4 {
  font-size: 18px;
  font-weight: 600;
  margin-bottom: 15px;
  cursor: pointer;
}

/* line 336, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.causes_item .causes_text p {
  font-size: 14px;
  line-height: 24px;
  font-weight: 300;
  margin-bottom: 0px;
}

/* line 346, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.causes_item .causes_bottom a {
  width: 50%;
  border: 1px solid;
  text-align: center;
  float: left;
  line-height: 50px;
  color: #fff;
  font-size: 14px;
  font-weight: 500;
}

/* line 358, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.causes_item .causes_bottom a + a {
  border-color: #eeeeee;
  background: #fff;
  font-size: 14px;
}

/* End Causes Area css
============================================================================================ */
/*================= latest_blog_area css =============*/
/* line 374, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.latest_blog_area {
  background: #f9f9ff;
}

/* line 378, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-recent-blog-post {
  margin-bottom: 30px;
}

/* line 381, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-recent-blog-post .thumb {
  overflow: hidden;
}

/* line 384, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-recent-blog-post .thumb img {
  transition: all 0.7s linear;
}

/* line 389, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-recent-blog-post .details {
  padding-top: 30px;
}

/* line 392, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-recent-blog-post .details .sec_h4 {
  line-height: 24px;
  padding: 10px 0px 13px;
  transition: all 0.3s linear;
}

/* line 403, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-recent-blog-post .date {
  font-size: 14px;
  line-height: 24px;
  font-weight: 400;
}

/* line 410, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-recent-blog-post:hover img {
  transform: scale(1.23) rotate(10deg);
}

/* line 417, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.tags .tag_btn {
  font-size: 12px;
  font-weight: 500;
  line-height: 20px;
  border: 1px solid #eeeeee;
  display: inline-block;
  padding: 1px 18px;
  text-align: center;
}

/* line 431, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.tags .tag_btn + .tag_btn {
  margin-left: 2px;
}

/*========= blog_categorie_area css ===========*/
/* line 438, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_categorie_area {
  padding-top: 30px;
  padding-bottom: 30px;
}

@media (min-width: 900px) {
  /* line 438, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .blog_categorie_area {
    padding-top: 80px;
    padding-bottom: 80px;
  }
}

@media (min-width: 1100px) {
  /* line 438, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .blog_categorie_area {
    padding-top: 120px;
    padding-bottom: 120px;
  }
}

/* line 454, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.categories_post {
  position: relative;
  text-align: center;
  cursor: pointer;
}

/* line 459, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.categories_post img {
  max-width: 100%;
}

/* line 463, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.categories_post .categories_details {
  position: absolute;
  top: 20px;
  left: 20px;
  right: 20px;
  bottom: 20px;
  background: rgba(34, 34, 34, 0.75);
  color: #fff;
  transition: all 0.3s linear;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* line 476, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.categories_post .categories_details h5 {
  margin-bottom: 0px;
  font-size: 18px;
  line-height: 26px;
  text-transform: uppercase;
  color: #fff;
  position: relative;
}

/* line 494, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.categories_post .categories_details p {
  font-weight: 300;
  font-size: 14px;
  line-height: 26px;
  margin-bottom: 0px;
}

/* line 501, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.categories_post .categories_details .border_line {
  margin: 10px 0px;
  background: #fff;
  width: 100%;
  height: 1px;
}

/* line 510, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.categories_post:hover .categories_details {
  background: rgba(222, 99, 32, 0.85);
}

/*============ blog_left_sidebar css ==============*/
/* line 525, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_item {
  margin-bottom: 50px;
}

/* line 529, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_details {
  padding: 30px 0 20px 10px;
  box-shadow: 0px 10px 20px 0px rgba(221, 221, 221, 0.3);
}

@media (min-width: 768px) {
  /* line 529, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .blog_details {
    padding: 60px 30px 35px 35px;
  }
}

/* line 537, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_details p {
  margin-bottom: 30px;
}

/* line 541, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_details a {
  color: #ff8b23;
}

/* line 544, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_details a:hover {
  color: #FF008C;
}

/* line 549, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_details h2 {
  font-size: 18px;
  font-weight: 600;
  margin-bottom: 8px;
}

@media (min-width: 768px) {
  /* line 549, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .blog_details h2 {
    font-size: 24px;
    margin-bottom: 15px;
  }
}

/* line 563, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog-info-link li {
  float: left;
  font-size: 14px;
}

/* line 567, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog-info-link li a {
  color: #999999;
}

/* line 571, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog-info-link li i,
.blog-info-link li span {
  font-size: 13px;
  margin-right: 5px;
}

/* line 577, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog-info-link li::after {
  content: "|";
  padding-left: 10px;
  padding-right: 10px;
}

/* line 583, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog-info-link li:last-child::after {
  display: none;
}

/* line 588, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog-info-link::after {
  content: "";
  display: block;
  clear: both;
  display: table;
}

/* line 596, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_item_img {
  position: relative;
}

/* line 599, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_item_img .blog_item_date {
  position: absolute;
  bottom: -10px;
  left: 10px;
  display: block;
  color: #fff;
  background-color: #FF008C;
  padding: 8px 15px;
  border-radius: 5px;
}

@media (min-width: 768px) {
  /* line 599, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .blog_item_img .blog_item_date {
    bottom: -20px;
    left: 40px;
    padding: 13px 30px;
  }
}

/* line 615, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_item_img .blog_item_date h3 {
  font-size: 22px;
  font-weight: 600;
  color: #fff;
  margin-bottom: 0;
  line-height: 1.2;
}

@media (min-width: 768px) {
  /* line 615, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .blog_item_img .blog_item_date h3 {
    font-size: 30px;
  }
}

/* line 627, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_item_img .blog_item_date p {
  font-size: 18px;
  margin-bottom: 0;
  color: #fff;
}

@media (min-width: 768px) {
  /* line 627, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .blog_item_img .blog_item_date p {
    font-size: 18px;
  }
}

/* line 647, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .widget_title {
  font-size: 20px;
  margin-bottom: 40px;
}

/* line 652, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .widget_title::after {
  content: "";
  display: block;
  padding-top: 15px;
  border-bottom: 1px solid #f0e9ff;
}

/* line 660, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .single_sidebar_widget {
  background: #fbf9ff;
  padding: 30px;
  margin-bottom: 30px;
}

/* line 664, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .single_sidebar_widget .btn_1 {
  margin-top: 0px;
}

/* line 672, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .search_widget .form-control {
  height: 50px;
  border-color: #f0e9ff;
  font-size: 13px;
  color: #999999;
  padding-left: 20px;
  border-radius: 0;
  border-right: 0;
}

/* line 681, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .search_widget .form-control::placeholder {
  color: #999999;
}

/* line 685, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .search_widget .form-control:focus {
  border-color: #f0e9ff;
  outline: 0;
  box-shadow: none;
}

/* line 694, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .search_widget .input-group button {
  background: #fff;
  border-left: 0;
  border: 1px solid #f0e9ff;
  padding: 4px 15px;
  border-left: 0;
}

/* line 701, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .search_widget .input-group button i,
.blog_right_sidebar .search_widget .input-group button span {
  font-size: 14px;
  color: #999999;
}

/* line 713, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .newsletter_widget .form-control {
  height: 50px;
  border-color: #f0e9ff;
  font-size: 13px;
  color: #999999;
  padding-left: 20px;
  border-radius: 0;
}

/* line 722, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .newsletter_widget .form-control::placeholder {
  color: #999999;
}

/* line 726, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .newsletter_widget .form-control:focus {
  border-color: #f0e9ff;
  outline: 0;
  box-shadow: none;
}

/* line 735, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .newsletter_widget .input-group button {
  background: #fff;
  border-left: 0;
  border: 1px solid #f0e9ff;
  padding: 4px 15px;
  border-left: 0;
}

/* line 742, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .newsletter_widget .input-group button i,
.blog_right_sidebar .newsletter_widget .input-group button span {
  font-size: 14px;
  color: #999999;
}

/* line 755, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .post_category_widget .cat-list li {
  border-bottom: 1px solid #f0e9ff;
  transition: all 0.3s ease 0s;
  padding-bottom: 12px;
}

/* line 760, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .post_category_widget .cat-list li:last-child {
  border-bottom: 0;
}

/* line 764, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .post_category_widget .cat-list li a {
  font-size: 14px;
  line-height: 20px;
  color: #888888;
}

/* line 769, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .post_category_widget .cat-list li a p {
  margin-bottom: 0px;
}

/* line 774, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .post_category_widget .cat-list li + li {
  padding-top: 15px;
}

/* line 791, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .popular_post_widget .post_item .media-body {
  justify-content: center;
  align-self: center;
  padding-left: 20px;
}

/* line 796, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .popular_post_widget .post_item .media-body h3 {
  font-size: 16px;
  line-height: 20px;
  margin-bottom: 6px;
  transition: all 0.3s linear;
}

/* line 807, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .popular_post_widget .post_item .media-body a:hover {
  color: #fff;
}

/* line 813, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .popular_post_widget .post_item .media-body p {
  font-size: 14px;
  line-height: 21px;
  margin-bottom: 0px;
}

/* line 820, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .popular_post_widget .post_item + .post_item {
  margin-top: 20px;
}

/* line 828, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .tag_cloud_widget ul li {
  display: inline-block;
}

/* line 831, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .tag_cloud_widget ul li a {
  display: inline-block;
  border: 1px solid #eeeeee;
  background: #fff;
  padding: 4px 20px;
  margin-bottom: 8px;
  margin-right: 3px;
  transition: all 0.3s ease 0s;
  color: #888888;
  font-size: 13px;
}

/* line 842, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .tag_cloud_widget ul li a:hover {
  background: #FF008C;
  color: #fff !important;
  -webkit-text-fill-color: #fff;
  text-decoration: none;
  -webkit-transition: 0.5s;
  transition: 0.5s;
}

/* line 857, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .instagram_feeds .instagram_row {
  display: flex;
  margin-right: -6px;
  margin-left: -6px;
}

/* line 863, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .instagram_feeds .instagram_row li {
  width: 33.33%;
  float: left;
  padding-right: 6px;
  padding-left: 6px;
  margin-bottom: 15px;
}

/* line 963, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog_right_sidebar .br {
  width: 100%;
  height: 1px;
  background: #eeeeee;
  margin: 30px 0px;
}

/* line 984, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog-pagination {
  margin-top: 80px;
}

/* line 988, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog-pagination .page-link {
  font-size: 14px;
  position: relative;
  display: block;
  padding: 0;
  text-align: center;
  margin-left: -1px;
  line-height: 45px;
  width: 45px;
  height: 45px;
  border-radius: 0 !important;
  color: #8a8a8a;
  border: 1px solid #f0e9ff;
  margin-right: 10px;
}

/* line 1005, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog-pagination .page-link i,
.blog-pagination .page-link span {
  font-size: 13px;
}

/* line 1017, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog-pagination .page-item.active .page-link {
  background-color: #fbf9ff;
  border-color: #f0e9ff;
  color: #888888;
}

/* line 1024, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.blog-pagination .page-item:last-child .page-link {
  margin-right: 0;
}

/*============ Start Blog Single Styles  =============*/
/* line 1049, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .blog_details {
  box-shadow: none;
  padding: 0;
}

/* line 1054, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .social-links {
  padding-top: 10px;
}

/* line 1057, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .social-links li {
  display: inline-block;
  margin-bottom: 10px;
}

/* line 1061, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .social-links li a {
  color: #cccccc;
  padding: 7px;
  font-size: 14px;
  transition: all 0.2s linear;
}

/* line 1074, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .blog_details {
  padding-top: 26px;
}

/* line 1077, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .blog_details p {
  margin-bottom: 20px;
  font-size: 15px;
}

/* line 1087, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .quote-wrapper {
  background: rgba(130, 139, 178, 0.1);
  padding: 15px;
  line-height: 1.733;
  color: #888888;
  font-style: italic;
  margin-top: 25px;
  margin-bottom: 25px;
}

@media (min-width: 768px) {
  /* line 1087, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .single-post-area .quote-wrapper {
    padding: 30px;
  }
}

/* line 1101, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .quotes {
  background: #fff;
  padding: 15px 15px 15px 20px;
  border-left: 2px solid;
}

@media (min-width: 768px) {
  /* line 1101, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .single-post-area .quotes {
    padding: 25px 25px 25px 30px;
  }
}

/* line 1111, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .arrow {
  position: absolute;
}

/* line 1114, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .arrow .lnr {
  font-size: 20px;
  font-weight: 600;
}

/* line 1121, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .thumb .overlay-bg {
  background: rgba(0, 0, 0, 0.8);
}

/* line 1126, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-top {
  padding-top: 15px;
  border-top: 1px solid #f0e9ff;
}

/* line 1130, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-top p {
  margin-bottom: 0;
}

/* line 1134, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-top .like-info {
  font-size: 14px;
}

/* line 1137, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-top .like-info i,
.single-post-area .navigation-top .like-info span {
  font-size: 16px;
  margin-right: 5px;
}

/* line 1144, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-top .comment-count {
  font-size: 14px;
}

/* line 1147, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-top .comment-count i,
.single-post-area .navigation-top .comment-count span {
  font-size: 16px;
  margin-right: 5px;
}

/* line 1156, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-top .social-icons li {
  display: inline-block;
  margin-right: 15px;
}

/* line 1160, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-top .social-icons li:last-child {
  margin: 0;
}

/* line 1164, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-top .social-icons li i,
.single-post-area .navigation-top .social-icons li span {
  font-size: 14px;
  color: #999999;
}

/* line 1182, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .blog-author {
  padding: 40px 30px;
  background: #fbf9ff;
  margin-top: 50px;
}

@media (max-width: 600px) {
  /* line 1182, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .single-post-area .blog-author {
    padding: 20px 8px;
  }
}

/* line 1191, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .blog-author img {
  width: 90px;
  height: 90px;
  border-radius: 50%;
  margin-right: 30px;
}

@media (max-width: 600px) {
  /* line 1191, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .single-post-area .blog-author img {
    margin-right: 15px;
    width: 45px;
    height: 45px;
  }
}

/* line 1204, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .blog-author a {
  display: inline-block;
}

/* line 1208, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .blog-author a:hover {
  color: #FF008C;
}

/* line 1213, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .blog-author p {
  margin-bottom: 0;
  font-size: 15px;
}

/* line 1218, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .blog-author h4 {
  font-size: 16px;
}

/* line 1225, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-area {
  border-bottom: 1px solid #eee;
  padding-bottom: 30px;
  margin-top: 55px;
}

/* line 1230, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-area p {
  margin-bottom: 0px;
}

/* line 1234, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-area h4 {
  font-size: 18px;
  line-height: 25px;
}

/* line 1240, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-area .nav-left {
  text-align: left;
}

/* line 1243, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-area .nav-left .thumb {
  margin-right: 20px;
  background: #000;
}

/* line 1247, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-area .nav-left .thumb img {
  -webkit-transition: 0.5s;
  transition: 0.5s;
}

/* line 1252, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-area .nav-left .lnr {
  margin-left: 20px;
  opacity: 0;
  -webkit-transition: 0.5s;
  transition: 0.5s;
}

/* line 1259, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-area .nav-left:hover .lnr {
  opacity: 1;
}

/* line 1264, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-area .nav-left:hover .thumb img {
  opacity: .5;
}

@media (max-width: 767px) {
  /* line 1240, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .single-post-area .navigation-area .nav-left {
    margin-bottom: 30px;
  }
}

/* line 1275, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-area .nav-right {
  text-align: right;
}

/* line 1278, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-area .nav-right .thumb {
  margin-left: 20px;
  background: #000;
}

/* line 1282, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-area .nav-right .thumb img {
  -webkit-transition: 0.5s;
  transition: 0.5s;
}

/* line 1287, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-area .nav-right .lnr {
  margin-right: 20px;
  opacity: 0;
  -webkit-transition: 0.5s;
  transition: 0.5s;
}

/* line 1294, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-area .nav-right:hover .lnr {
  opacity: 1;
}

/* line 1299, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.single-post-area .navigation-area .nav-right:hover .thumb img {
  opacity: .5;
}

@media (max-width: 991px) {
  /* line 1307, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .single-post-area .sidebar-widgets {
    padding-bottom: 0px;
  }
}

/* line 1314, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comments-area {
  background: transparent;
  border-top: 1px solid #eee;
  padding: 45px 0;
  margin-top: 50px;
}

@media (max-width: 414px) {
  /* line 1314, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .comments-area {
    padding: 50px 8px;
  }
}

/* line 1325, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comments-area h4 {
  margin-bottom: 35px;
  font-size: 18px;
}

/* line 1332, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comments-area h5 {
  font-size: 16px;
  margin-bottom: 0px;
}

/* line 1341, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comments-area .comment-list {
  padding-bottom: 48px;
}

/* line 1344, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comments-area .comment-list:last-child {
  padding-bottom: 0px;
}

/* line 1348, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comments-area .comment-list.left-padding {
  padding-left: 25px;
}

@media (max-width: 413px) {
  /* line 1354, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .comments-area .comment-list .single-comment h5 {
    font-size: 12px;
  }
  /* line 1358, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .comments-area .comment-list .single-comment .date {
    font-size: 11px;
  }
  /* line 1362, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .comments-area .comment-list .single-comment .comment {
    font-size: 10px;
  }
}

/* line 1369, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comments-area .thumb {
  margin-right: 20px;
}

/* line 1372, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comments-area .thumb img {
  width: 70px;
  border-radius: 50%;
}

/* line 1378, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comments-area .date {
  font-size: 14px;
  color: #999999;
  margin-bottom: 0;
  margin-left: 20px;
}

/* line 1385, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comments-area .comment {
  margin-bottom: 10px;
  color: #777777;
  font-size: 15px;
}

/* line 1391, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comments-area .btn-reply {
  background-color: transparent;
  color: #888888;
  padding: 5px 18px;
  font-size: 14px;
  display: block;
  font-weight: 400;
}

/* line 1408, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comment-form {
  border-top: 1px solid #eee;
  padding-top: 45px;
  margin-top: 50px;
  margin-bottom: 20px;
}

/* line 1416, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comment-form .form-group {
  margin-bottom: 30px;
}

/* line 1420, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comment-form h4 {
  margin-bottom: 40px;
  font-size: 18px;
  line-height: 22px;
}

/* line 1428, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comment-form .name {
  padding-left: 0px;
}

@media (max-width: 767px) {
  /* line 1428, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .comment-form .name {
    padding-right: 0px;
    margin-bottom: 1rem;
  }
}

/* line 1437, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comment-form .email {
  padding-right: 0px;
}

@media (max-width: 991px) {
  /* line 1437, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
  .comment-form .email {
    padding-left: 0px;
  }
}

/* line 1445, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comment-form .form-control {
  border: 1px solid #f0e9ff;
  border-radius: 5px;
  height: 48px;
  padding-left: 18px;
  font-size: 13px;
  background: transparent;
}

/* line 1453, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comment-form .form-control:focus {
  outline: 0;
  box-shadow: none;
}

/* line 1458, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comment-form .form-control::placeholder {
  font-weight: 300;
  color: #999999;
}

/* line 1463, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comment-form .form-control::placeholder {
  color: #777777;
}

/* line 1468, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comment-form textarea {
  padding-top: 18px;
  border-radius: 12px;
  height: 100% !important;
}

/* line 1474, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comment-form ::-webkit-input-placeholder {
  /* Chrome/Opera/Safari */
  font-size: 13px;
  color: #777;
}

/* line 1480, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comment-form ::-moz-placeholder {
  /* Firefox 19+ */
  font-size: 13px;
  color: #777;
}

/* line 1486, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comment-form :-ms-input-placeholder {
  /* IE 10+ */
  font-size: 13px;
  color: #777;
}

/* line 1492, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog.scss */
.comment-form :-moz-placeholder {
  /* Firefox 18- */
  font-size: 13px;
  color: #777;
}

/*============ End Blog Single Styles  =============*/
/**************** blog part css start ****************/
/* line 2, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
.blog_part {
  margin-bottom: 140px;
}

@media (max-width: 576px) {
  /* line 2, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
  .blog_part {
    margin-bottom: 0px;
    padding: 0px 0px 70px;
  }
}

@media only screen and (min-width: 576px) and (max-width: 767px) {
  /* line 2, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
  .blog_part {
    margin-bottom: 0px;
    padding: 0px 0px 70px;
  }
}

@media only screen and (min-width: 768px) and (max-width: 991px) {
  /* line 2, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
  .blog_part {
    margin-bottom: 0px;
    padding: 0px 0px 70px;
  }
}

/* line 19, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
.blog_part .blog_right_sidebar .widget_title {
  font-size: 20px;
  margin-bottom: 40px;
  font-style: inherit !important;
}

@media (max-width: 576px) {
  /* line 24, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
  .blog_part .single-home-blog {
    margin-bottom: 140px;
    margin-top: 20px;
  }
}

@media only screen and (min-width: 576px) and (max-width: 767px) {
  /* line 24, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
  .blog_part .single-home-blog {
    margin-bottom: 140px;
    margin-top: 20px;
  }
}

@media only screen and (min-width: 768px) and (max-width: 991px) {
  /* line 24, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
  .blog_part .single-home-blog {
    margin-bottom: 140px;
    margin-top: 20px;
  }
}

/* line 40, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
.blog_part .single-home-blog .card-img-top {
  border-radius: 0px;
}

/* line 43, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
.blog_part .single-home-blog .card {
  border: 0px solid transparent;
  border-radius: 0px;
  background-color: transparent;
  position: relative;
}

/* line 48, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
.blog_part .single-home-blog .card .card-body {
  padding: 25px 10px 29px 40px;
  background-color: #fff;
  position: absolute;
  left: 20px;
  bottom: -140px;
  box-shadow: -7.552px 9.326px 20px 0px rgba(1, 84, 85, 0.1);
  border-radius: 10px;
}

@media (max-width: 576px) {
  /* line 48, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
  .blog_part .single-home-blog .card .card-body {
    padding: 15px;
    left: 10px;
    bottom: -140px;
  }
}

@media only screen and (min-width: 576px) and (max-width: 767px) {
  /* line 48, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
  .blog_part .single-home-blog .card .card-body {
    padding: 15px;
    left: 10px;
    bottom: -140px;
  }
}

@media only screen and (min-width: 992px) and (max-width: 1200px) {
  /* line 48, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
  .blog_part .single-home-blog .card .card-body {
    padding: 20px;
  }
}

/* line 72, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
.blog_part .single-home-blog .card .card-body a {
  color: #FF008C;
  text-transform: uppercase;
  -webkit-transition: 0.8s;
  transition: 0.8s;
}

/* line 76, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
.blog_part .single-home-blog .card .card-body a:hover {
  background: -webkit-linear-gradient(131deg, #ff7e5f 0%, #feb47b 99%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

/* line 83, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
.blog_part .single-home-blog .card .dot {
  position: relative;
  padding-left: 20px;
}

/* line 86, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
.blog_part .single-home-blog .card .dot:after {
  position: absolute;
  content: "";
  width: 10px;
  height: 10px;
  top: 5px;
  left: 0;
  background-color: #FF008C;
  border-radius: 50%;
}

/* line 97, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
.blog_part .single-home-blog .card span {
  color: #8a8a8a;
  margin-bottom: 10px;
  display: inline-block;
  margin-top: 10px;
}

@media (max-width: 576px) {
  /* line 97, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
  .blog_part .single-home-blog .card span {
    margin-bottom: 5px;
    margin-top: 5px;
  }
}

@media only screen and (min-width: 576px) and (max-width: 767px) {
  /* line 97, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
  .blog_part .single-home-blog .card span {
    margin-bottom: 5px;
    margin-top: 5px;
  }
}

@media only screen and (min-width: 768px) and (max-width: 991px) {
  /* line 97, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
  .blog_part .single-home-blog .card span {
    margin-bottom: 5px;
    margin-top: 5px;
  }
}

@media only screen and (min-width: 992px) and (max-width: 1200px) {
  /* line 97, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
  .blog_part .single-home-blog .card span {
    margin-bottom: 5px;
    margin-top: 5px;
  }
}

/* line 119, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
.blog_part .single-home-blog .card h5 {
  font-weight: 600;
  line-height: 1.5;
  font-size: 20px;
  -webkit-transition: 0.8s;
  transition: 0.8s;
  text-transform: capitalize;
  margin-bottom: 22px;
}

@media (max-width: 576px) {
  /* line 119, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
  .blog_part .single-home-blog .card h5 {
    margin-bottom: 10px;
  }
}

@media only screen and (min-width: 576px) and (max-width: 767px) {
  /* line 119, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
  .blog_part .single-home-blog .card h5 {
    margin-bottom: 10px;
    font-size: 16px;
  }
}

@media only screen and (min-width: 768px) and (max-width: 991px) {
  /* line 119, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
  .blog_part .single-home-blog .card h5 {
    margin-bottom: 10px;
  }
}

@media only screen and (min-width: 992px) and (max-width: 1200px) {
  /* line 119, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
  .blog_part .single-home-blog .card h5 {
    margin-bottom: 10px;
    font-size: 18px;
  }
}

/* line 140, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
.blog_part .single-home-blog .card h5:hover {
  -webkit-transition: 0.8s;
  transition: 0.8s;
  background: -webkit-linear-gradient(131deg, #feb47b 0%, #ff7e5f 99%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  -webkit-animation: 1s;
}

/* line 150, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
.blog_part .single-home-blog .card ul li {
  display: inline-block;
  color: #8a8a8a;
  margin-right: 14px;
}

@media (max-width: 576px) {
  /* line 150, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
  .blog_part .single-home-blog .card ul li {
    margin-right: 10px;
  }
}

@media only screen and (min-width: 576px) and (max-width: 767px) {
  /* line 150, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
  .blog_part .single-home-blog .card ul li {
    margin-right: 10px;
  }
}

@media only screen and (min-width: 768px) and (max-width: 991px) {
  /* line 150, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
  .blog_part .single-home-blog .card ul li {
    margin-right: 10px;
  }
}

@media only screen and (min-width: 992px) and (max-width: 1200px) {
  /* line 150, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
  .blog_part .single-home-blog .card ul li {
    margin-right: 10px;
  }
}

/* line 166, ../../Arafath/CL/CL October/219. SEO/HTML/scss/_blog_part.scss */
.blog_part .single-home-blog .card ul li span {
  margin-right: 10px;
  font-size: 12px;
}

/*# sourceMappingURL=style.css.map */
</style>
@endsection

@section('content')

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo" style="padding-left:20px;">
                                <a href="{{ asset('/')}}">
                                    <img src="{{ asset('../pictures/otro1.png') }}" alt="" style="heigth:50px; width:100px;">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                      <!-- Authentication Links -->
                                      @guest   <!--The user is not authenticated...-->
                                        <li><a href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a></li>
                                            @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}" >{{ __('Crear cuenta') }}</a></li>
                                            @endif
                                      @else <!--The user is authenticated...-->
                                          <li><a href="{{ route('home') }}"> {{ "Mi cuenta" }}</a></li>
                                          <li><a href="{{ route('logout') }}"> {{ __('Salir') }}</a></li>
                                      @endguest
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-10 offset-xl-1">
                        <div class="slider_text text-center">
                            <div class="text">
                                <h3>
                                ÁNGELES ROSALES
                                </h3>
                            {{-- <a class="boxed-btn3" href="#">Get Started</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

        <!-- compapy_info  -->
    <div class="compapy_info">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-md-5">
                    <div class="man_thumb">
                        <img src="{{ asset('../pictures/man.png')}}" alt="">
                    </div>
                </div>
                <div class="col-xl-7 col-md-7">
                    <div class="company_info">
                        <h3>Factura a cualquier lugar del mundo <br>
                            con solo esta aplicación!</h3>
                            <p>Enjoy it ;)</p>

                        <a target="_blank" href="{{ url('https://github.com/anrosalesfdez/miproyectoFP')}}" class="boxed-btn3">Sobre el proyecto.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ compapy_info  -->   

    <!-- service_area  -->
    <div class="service_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center">
                        <div class="icon">
                            <img src="{{ '../pictures/seo_1.svg' }}" alt="">
                        </div>
                        <h3>Sigue tu negocio</h3>
                        <p>Haz un seguimiento periodico de cómo van tus cuentas.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center">
                        <div class="icon">
                            <img src="{{ '../pictures/seo_2.svg' }}" alt="">
                        </div>
                        <h3>Facturación</h3>
                        <p>Emite facturas a cualquier figura jurídica sin problema.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center">
                        <div class="icon">
                            <img src="{{ '../pictures/seo_3.svg' }}" alt="">
                        </div>
                        <h3>Impuestos</h3>
                        <p>Calcula lo modelos de IVA e IRPF y exportalos al portal de AEAT.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--/ service_area  -->

    <footer>
      @include('pie')
    </footer>
@endsection

