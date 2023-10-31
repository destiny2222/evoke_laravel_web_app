<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
    <style type="text/css">
         @media screen {
            @font-face {
                font-family: 'BR Firma CW';
                src: url('https://cowrywise.com/fonts/br-firma/BRFirmaCW-Regula=r.woff2') format(' woff2');
                font-weight: normal;
                        font-display: fallback;
                        font-style: normal;
                }

                @font-face {
                    font-family: 'BR Firma CW';
                    src: url('https://cowrywise.com/fonts/br-firma/BRFirmaCW-Medium=.woff2') format(' woff2');
                        font-weight: 500;
                        font-display: fallback;
                        font-style: normal;
                    }

                    @font-face {
                        font-family: 'BR Firma CW';
                        src: url('https://cowrywise.com/fonts/br-firma/BRFirmaCW-SemiBo=ld.woff2') format(' woff2');
                        font-weight: 600;
                            font-display: fallback;
                            font-style: normal;
                        }
                    }

                     .column_cell td, .column_cell p {
                        font-size:16px
                    }

                    .email_body ul li {
                        color:rgba(10, 46, 101, 0.8); font-weight:normal; font-size:16px; line-height:1.6; margin:20px 0 !important; list-style:disc !important; -webkit-font-smoothing:antialiase=d
                    }

                    .email_body ul li a {
                        color:#0067f5; font-size:16px !important; text-decoration:none
                    }

                    .email_body h4.welcome-email__name {
                        margin-top:0; font-size:16px !important
                    }

                    img.email_image {
                        height:auto !important; max-width:600px !important; width:100% !important
                    }

                    img.email_image.small {
                        max-width:200px !important
                    }

                    img.email_image.cta {
                        max-width:240px !important
                    }

                    p, span, a {
                        font-family:"BR Firma CW"=, 'Google Sans', sans-serif; -webkit-font-smoothing:antialiased
                    }

                    .email_body a, .email_body a span, .column_cell td, .column_cell h2 {
                        color:#233858
                    }

                    .column_cell span.unsubscribe-text {
                        font-size:10px; color:rgba(10, 46, 101, 0.5); margin-top:0; line-height:1.5; margin-bottom:20px; display:inline-block !important; ma=x-width:70%
                    }

                    .column_cell span.unsubscribe-text a {
                        color:#0067f5; text-decoration:none
                    }

                    .column_cell p {
                        line-height:1.6; color:rgba(10, 46, 101, 0.8); margin-top:0; margin-bottom:30px
                    }

                    .column_cell p span {
                        font-size:12px
                    }

                    .column_cell p span.green {
                        font-weight:500; color:#3bb75e
                    }

                    .column_cell p span.red {
                        font-weight:500; color:#e44d48
                    }

                    .column_cell p.table-label, .column_cell p.table-data {
                        margin-top:20px; margin-bottom:20px
                    }

                    .column_cell p.table-data {
                        font-family:"BR Firma CW", 'Google Sans', sans-serif; color:#23385=8; font-weight:500
                    }

                    .column_cell p.table-data-red {
                        color:red
                    }

                    .column_cell p.table-data-amount {
                        color:#0067f5
                    }

                    .column_cell p.alert-text {
                        font-size:14px; margin-top:20px
                    }

                    .column_cell p.promo-text {
                        font-size:12px; margin-top:0; margin-bottom:20px; padding-top:20px; border-top:1px solid rgba(60, 60, 60, 0.07)
                    }

                    .column_cell p a {
                        color:#0067f5; text-decoration:none
                    }

                    span.date-saved {
                        font-size:16px=; display:block; opacity:.7
                    }

                    span.amount-saved {
                        font-family:'BR Firma CW', 'Google Sans',
                 sans-serif; font-weight:600; color:#0067f5; line-height:1.6; font-size:32px; margin-bottom:10px; display:block
                    }

                    a.cta-btn {
                        background-color:#0067f5; border-radius:4px; padding-top:16px; padding-bottom:16px; padding-left:32px; padding-right:32px; letter-spacing:1.4px; text-decoration:none !important; font-size:14px; =font-weight:600; text-transform:uppercase; color:white !important
                    }

                    .email_footer {
                        height:360px; margin-top:20px; display:block
                    }

                    a.footer_link {
                        color:white; text-decoration:none !important; margin-bottom:25px; font-size:13px; display:block
                    }

                    p.footer_address {
                        display:block; color:white; opacity:.7; font-size:13px; margin-bottom:10px
                    }

                    .social_links {
                        display:inline
                    }

                    .social_links img {
                        height:auto; width:12px; opacity:0.7; object-fit:cover; margin-left:12px
                    }

                    .column_cell h1, .column_cell p.lead, .column_cell h1 a, .column_cell h1 span, .column_cell p.lead a, .column_cell p.lead span {
                        color:#233858
                    }

                    .column_cell h1, .column_cell h2 {
                        padding:0; margin-left:0; margin-right:0
                    }

                    .column_cell h1 span.green, .column_cell h2 span.green {
                        font-weight:500; color:#3bb75e
                    }

                    .column_cell h1 {
                        font-size:24px; line-height:36px; margin-top:32px; font-weight:800; margin-bottom:14px
                    }

                    .column_cell h2 {
                        font-size:18px; line-height:25px; font-weight:800; margin-top:24px; margin-bottom:8px
                    }

                    .container {
                        max-width:720px; margin:0 auto; display:block; 
                        /* background-color:white */
                    }

                    body {
                        font-family:"BR Firma CW", 'Googl=e Sans', -apple-system, BlinkMacSystemFont, ' Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; 
                        background-color:#F1F3F5 !important; margin:0; color:#233858
                    }

                    .column_cell p.weekly-summary__data {
                        font-size:15px; font-weight:bold
                    }

                    .weekly-summary p.weekly-summary__date {
                        color:#233858; font-size:17px
                    }

                    .weekly-summary__card {
                        height:60px; padding:20px 15px 15px 1=5px; background-color:#0067f5; color:white; 
                        border-radius:4px; text-align:center; 
                        -webkit-box-shadow:4px 6px 12px 0 rgba(0, 0, 0, 0.1); box-shadow:0 4px 12px 0rgba(0, 0, 0, 0.1)
                    }

                    .weekly-summary__card-item {
                        width:33.333333%
                    }

                    .weekly-summary__card span {
                        font-size:8px; opacity:.8; text-transform:uppercase; letter-spacing:1px
                    }

                    .weekly-summary__card p {
                        font-size:22px; font-weight:500; margin:0; line-height:2.5
                    }

                    .chart__container {
                        border-spacing:0; border-collapse:collapse; vertical-align:top; min-height:15=0px; 
                        text-align:inherit; table-layout:fixed
                    }

                    .chart__container tbody {
                        vertical-align:bottom
                    }

                    .chart__inner {
                        width:100%; margin:0; padding:0; text-align:center
                    }

                    .chart__item {
                        padding:0 10px
                    }

                    .chart__bar {
                        width:100%; margin:0; padding:0; text-align:center; background-color:#5AC8FA
                    }

                    .chart__bar-text {
                        font-weight:normal; color:#777; width:100%; margin:0; padding:0; text-align:center;
                         font-size:10px; min-height:25px; line-height:25px; text-transform:uppercase; letter-spacing:1px
                    }

                    .chart__bar-1 {
                        height:1.=5px
                    }

                    .chart__bar-2 {
                        height:3px
                    }

                    .chart__bar-3 {
                        height:4.5px
                    }

                    .chart__bar-4 {
                        height:6px
                    }

                    .chart__bar-5 {
                        height:7.5px
                    }

                    .chart__bar-6 {
                        height:9px
                    }

                    .chart__bar-7 {
                        height:10.5px
                    }

                    .chart__bar-8 {
                        height:12px
                    }

                    .chart__bar-9 {
                        height:13.5px
                    }

                    .chart__bar-10 {
                        height:15px
                    }

                    .chart__bar-11 {
                        height:16.5px
                    }

                    .chart__bar-12 {
                        height:18px
                    }

                    .chart__bar-13 {
                        height:19.5px
                    }

                    .chart__bar-14 {
                        height:21px
                    }

                    .chart__bar-15 {
                        height:22.5px
                    }

                    .chart__bar-16 {
                        height:24px
                    }

                    .chart__bar-17 {
                        height:25.5px
                    }

                    .chart__bar-18 {
                        height:27px
                    }

                    .chart__bar-19 {
                        height:28.5px
                    }

                    .chart__bar-20 {
                        height:30px
                    }

                    .chart__bar-21 {
                        height:31.5px
                    }

                    .chart__bar-22 {
                        height:33px
                    }

                    .chart__bar-23 {
                        height:=34.5px
                    }

                    .chart__bar-24 {
                        height:36px
                    }

                    .chart__bar-25 {
                        height:37.5px
                    }

                    .chart__bar-26 {
                        height:39px
                    }

                    .chart__bar-27 {
                        height:40.5px
                    }

                    .chart__bar-28 {
                        height:42px
                    }

                    .chart__bar-29 {
                        height:43.5px
                    }

                    .chart__bar-30 {
                        height:45px
                    }

                    .chart__bar-31 {
                        height:46.5px
                    }

                    .chart__bar-32 {
                        height:48px
                    }

                    .chart__bar-33 {
                        height:49.5px
                    }

                    .chart__bar-34 {
                        height:51px
                    }

                    .chart__bar-35 {
                        height:52.5px
                    }

                    .chart__bar-36 {
                        height:54px
                    }

                    .chart__bar-37 {
                        height:55.5px
                    }

                    .chart__bar-38 {
                        height:57px
                    }

                    .chart__bar-39 {
                        height:58=.5px
                    }

                    .chart__bar-40 {
                        height:60px
                    }

                    .chart__bar-41 {
                        height:61.5px
                    }

                    .chart__bar-42 {
                        height:63px
                    }

                    .chart__bar-43 {
                        height:64.5px
                    }

                    .chart__bar-44 {
                        height:66px
                    }

                    .chart__bar-45 {
                        height:67.5px
                    }

                    .chart__bar-46 {
                        height:69px
                    }

                    .chart__bar-47 {
                        height:70.=5px
                    }

                    .chart__bar-48 {
                        height:72px
                    }

                    .chart__bar-49 {
                        height:73.5px
                    }

                    .chart__bar-50 {
                        =height:75px
                    }

                    .chart__bar-51 {
                        height:76.5px
                    }

                    .chart__bar-52 {
                        height:78px
                    }

                    .chart__bar-53 {
                        height:79.5px
                    }

                    .chart__bar-54 {
                        height:81px
                    }

                    .chart__bar-55 {
                        height:82.5px
                    }

                    .chart__bar-56 {
                        height:84px
                    }

                    .chart__bar-57 {
                        height:85.5px
                    }

                    .chart__bar-58 {
                        height:87px
                    }

                    .chart__bar-59 {
                        height:88.5px
                    }

                    .chart__bar-60 {
                        height:90px
                    }

                    .chart__bar-61 {
                        height:91.5px
                    }

                    .chart__bar-62 {
                        height:93px
                    }

                    .chart__bar-63 {
                        height:94.5px
                    }

                    .chart__bar-64 {
                        height:96px
                    }

                    .chart__bar-65 {
                        height:97.5px
                    }

                    .chart__bar-66 {
                        height:99px
                    }

                    .chart__bar-67 {
                        height:100.5px
                    }

                    .chart__bar-68 {
                        height:102px
                    }

                    .chart__bar-69 {
                        height:103.5px
                    }

                    .chart__bar-70 {
                        height:105px
                    }

                    .chart__bar-71 {
                        height:106.5px
                    }

                    .chart__bar-72 {
                        height:108px
                    }

                    .chart__bar-73 {
                        height:109.5px
                    }

                    .chart__bar-74 {
                        height:111px
                    }

                    .chart__bar-75 {
                        height:112.5px
                    }

                    .chart__bar-76 {
                        height:114px
                    }

                 .chart__bar-77 {
                        height:115.5px
                    }

                    .chart__bar-78 {
                        height:117px
                    }

                    .chart__bar-79 {
                        height:118.5px
                    }

                    .chart__bar-80 {
                        height:120px
                    }

                    .chart__bar-81 {
                        height:121.5px
                    }

                    .chart__bar-82 {
                        height:123px
                    }

                    .chart__bar-83 {
                        height:124.5px
                    }

                    .chart__bar-84 {
                        height=:126px
                    }

                    .chart__bar-85 {
                        height:127.5px
                    }

                    .chart__bar-86 {
                        height:129px
                    }

                    .chart__bar-87 {
                        height:130.5px
                    }

                    .chart__bar-88 {
                        height:132px
                    }

                    .chart__bar-89 {
                        height:133.5px
                    }

                    .chart__bar-90 {
                        height:135px
                    }

                    .chart__bar-91 {
                        height:136.5px
                    }

                    .chart__bar-92= {
                        height:138px
                    }

                    .chart__bar-93 {
                        height:139.5px
                    }

                    .chart__bar-94 {
                        height:141px
                    }

                    .chart__bar-95 {
                        height:142.5px
                    }

                    .chart__bar-96 {
                        height:144px
                    }

                    .chart__bar-97 {
                        height:145.5px
                    }

                    .chart__bar-98 {
                        height:147px
                    }

                    .chart__bar-99 {
                        height:148.5px
                    }

                    .chart__bar-100 {
                        height:150px
                    }

                    img.welcome-signature {
                        max-width:60px; display:block
                    }

                    .col_3 p.mb_0 {
                        text-align:right
                    }

                    p.bold-text {
                        font-weight:bold !important
                    }

                    .cowry__helper-text {
                        font-size:13px !important; color:red !important; line-height:1.6 !important
                    }

                    .footer__table {
                        margin-top:25px
                    }

                    .footer__text {
                        color:#233858; font-size:10px !important; opacity:.6; margin-bottom:15px !important
                    }

                    .subtitle {
                        font-size:16px !important
                    }

                    p.mb_0 {
                        font-size:15px
                    }

                    .plan__balance {
                        color:#0067f5 !important; font-weight:bold !important
                    }

                    .template-body table {
                        border-collapse:separate
                    }

                    .email_body a, .email_body a:visited {
                        text-decoration:underline
                    }

                    .email_table, .content_section, .column, .column_cell {
                        width:100%; min-width:100%
                    }


                    .email_table{
                        padding: 10px 30px;
                        text-align: center;
                    }

                    .email_body {
                        font-size:0 !important; line-height:100%; text-align:center; padding-left:8px; padding-right:8px
                    }

                    .template-body {
                        background-color:#242424
                    }

                    .email_container, .email_row, .col_1, .col_2, .col_3 {
                        font-size:0; display:inline-block; width:100%; min-width:100%; min-width:0 !important; vertical-align:top
                    }

                    .email_container {
                        max-width:660px; margin:0 auto; text-align:center
                    }

                    .content_cell {
                        width:100%; min-width:100%; min-width:0 !important; font-size:0; text-align:center; vertical-align:top
                    }

                    .column_cell {
                        padding-left:8px; padding-right:8px; vertical-align:top
                    }

                    .jumbotron_cell {
                        padding-top:32px; vertical-align:top; border-radius:3px; background-position:50% 0; background-repeat:no-repeat; border:0
                    }

                    .jumbotron_cell--no-padding {
                        padding-left:0; padding-right:0
                    }

                    .jumbotron_b {
                        border:2px solid; border-color:transparent; border-radius:6px
                    }

                    .email_row {
                        display:block; max-width:600px !important; margin=:0 auto; text-align:center; clear:both
                    }

                    .col_1 {
                        width:50%; float:left
                    }

                    .col_2 {
                        width:=216px
                    }

                    .col_3 {
                        width:50%; float:right
                    }

                    .hdr_menu {
                        text-align:right; padding-top:1=0px
                    }

                    .hdr_menu p {
                        line-height:100%
                    }

                    .hdr_menu a, .email_body a.blink, .email_body a.blink:visited {
                        text-decoration:none
                    }

                    .email_body .logo_c {
                        line-height:100%
                    }

                    .logo_c img {
                        width:auto; height:24px
                    }

                    .logo_mark img {
                        width:129px; height:24px
                    }

                    .email_body .fsocial {
                        line-height:100%
                    }

                    .fsocial img {
                        max-width:24px; height:auto !important
                    }

                    .hr_ep {
                        font-size:0; line-height:1px; mso-line-height-rule:exactly; min-height:1px; overflow:hidden; height:2px; background-color:transparent !=important
                    }

                    .content_b img.hero {
                        margin:20px 0 20px 0; max-width:500px; width:410px; height:auto
                    }

                    .accent_b {
                        border-color:transparent
                    }

                    .accent_b .jumbotron_cell {
                        background-color:transparent
                    }

                    .accent_b .ebtn a, .accent_b .ebtn span, .theme-3 .accent_b .ebtn a, .theme-3 .accent_b .ebtn span {
                        color:#5c69ea
                    }

                    .default_b {
                        border-color:#43444b
                    }

                    .default_b .jumbotron_cell {
                        background-color:#616471
                    }

                    .default_b .ebtn a, .default_b .ebtn span, .theme-3 .default_b .ebtn a, .theme-3 .default_b .ebtn span {
                        color:#616471
                    }

                    .success_b {
                        border-color:#4c7051
                    }

                    .success_b .jumbotron_cell {
                        background-color:#74bb7e
                    }

                    .success_b .ebtn a, .success_b .ebtn span, .theme-3 .success_b .ebtn a, .theme-3 .success_b .ebtn span {
                        color:#74bb7e
                    }

                    .info_b {
                        border-color:#596c82
                    }

                    .info_b .jumbotron_cell {
                        background-color:#6f86d6
                    }

                    .info_b .ebtn a, .info_b .ebtn span, .theme-3 .info_b .ebtn a, .theme-3 .info_b .ebtn span {
                        color:#6f86d6
                    }

                    .warning_b {
                        border-color:#916255
                    }

                    .warning_b .jumbotron_cell {
                        background-color:#fda085
                    }

                    .warning_b .ebtn a, .warning_b .ebtn span, .theme-3 .warning_b .ebtn a, .theme-3 .warning_b .ebtn span {
                        color:#fda085=
                    }

                    .danger_b {
                        border-color:#90424d
                    }

                    .danger_b .jumbotron_cell {
                        background-color:=#fc6076
                    }

                    .danger_b .ebtn a, .danger_b .ebtn span, .theme-3 .danger_b .ebtn a, .theme-3 .danger_b .ebtn span {
                        color:#fc6076
                    }

                    img {
                        max-width:200px
                    }

                    .column_cell.imgr, .column_cell .imgr img {
                        width:100%; height:auto; clear:both; font-size:0; line-height:100%
                    }

                    .column_cell .imgr a, .column_cell .imgr span {
                        line-height:=1
                    }

                    .imgr32 img {
                        max-width:32px
                    }

                    .imgr44 img {
                        max-width:44px
                    }

                    .imgr440 img {
                        max-width:440px
                    }

                    .ebtn, .ebtn_xs, .ic_h, .hr_rl {
                        display:table; margin-left:auto; margin-right:auto
                    }

                    .ebtn td {
                        font-size:20px; font-weight:bold; line-height:22px; mso-line-height-rule:exactly; 
                        border-radius:64px; text-align:center
                    }

                    .ebtn td a {
                        text-decoration:none
                    }

                    .ic_h {
                        width:128px
                    }

                    .ic_h td {
                        text-align:center; vertical-align:middle; line-height:100%; mso-line-height-rule:exactly; border-radius:100px
                    }

                    .ic_h img {
                        max-width:128px; line-height:100%
                    }

                    .email_summary {
                        display:none; font-size:1px; line-height:1px; max-height:0px; max-width:0px; opacity:0; overflow:hidden
                    }

                    .bra {
                        border-radius:4px
                    }

                    .tc {
                        text-align:center
                    }

                    .tc .imgr img {
                        margin-left:auto; margin-right:auto
                    }

                    .tl {
                        text-align:left
                    }

                    table.tl {
                        margin-left:0; margin-right:auto
                    }

                    .tr {
                        text-align:right
                    }

                    table.tr {
                        margin-left:auto; margin-right:0
                    }

                    .py {
                        padding-top:16px; padding-bottom:16px
                    }

                    .px {
                        padding-left:16px; padding-right:16px
                    }

                    .pxs {
                        padding-left:8px; padding-right:8px
                    }

                    .pt {
                        padding-top:=16px
                    }

                    .pte {
                        padding-top:32px
                    }

                    .pb {
                        padding-bottom:24px
                    }

                    .pb_xs {
                        padding-bottom:8px
                    }

                    .pbe {
                        padding-bottom:24px
                    }

                    .pte_lg {
                        padding-top:36px
                    }

                    .column_cell .mt_0 {
                        margin-top:0
                    }

                    .column_cell .mb_0 {
                        margin-bottom:0
                    }

                    .column_cell .mb_xs {
                        margin-bottom:8px
                    }

                    .column_cell .mb {
                        margin-bottom:24px
                    }

                    .bt {
                        border-top:1px solid rgba(60=, 60, 60, 0.07)
                    }

                    .bb {
                        border-bottom:1px solid rgba(60, 60, 60, 0.07)
                    }

                    .bbw {
                        border-bottom:1px solid rgba(255, 255, 255, 0.07)
                    }

                    .bt, .bb {
                        border-bottom-color:rgba(60, 6=0, 60, 0.07)
                    }

                    .clear {
                        content:' '; display:block; clear:both; height:1px; overflow:=hidden; font-size:0
                    }

                    .column_cell h1, .column_cell .ebtn a, .column_cell .ebtnspan {
                        font-family:"BR Firma CW", 'Google Sans', -apple-system, BlinkMacSyste=mFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif !important}.ebtn a,.ebtn span{display:block !important=
; text-align:center !important; line-height:inherit !important
                    }

                    .ebtn a {
                        padding:13px 42px !important; line-height:26px !important; font-weight:700 !important
                    }

                    .ebtn td, .ic_h td {
                        -webkit-transition:-webkit-box-shadow .3s ease-out; transition:box-shadow .3s ease-out
                    }

                    .ebtn td:hover, .ebtn td:foc=us {
                        -webkit-box-shadow:4px 6px 12px 0 rgba(0, 0, 0, 0.35); box-shadow:0 4px 12px=0 rgba(0, 0, 0, 0.35)
                    }

                    .template-mobile .email_holder, .template-mobile .email_container, .template-mobile .col_1, 
                    .template-mobile .col_2, .template-mobile .col_3 {
                        width:100% !important; max-width:none !important
                    }

                    .template-mobile .hdr_menu {
                        padding-top:18px !important
                    }

                    .template-mobile .pte_lg, .template-mobile .py.pte_lg {
                        padding-top:32px !important
                    }

                    .template-mobile .switch_xs {
                        text-align:left !important
                    }

                    .template-mobile .hide {
                        max-height:0 !important; display:none !important;
                         mso-hide:all !important; overflow:hidden !important; font-size:0 !important
                    }
                    body{
                        background-color: #F1F3F5 !important;
                    }
    </style>
</head>

<body style="font-family: &#39;BR Firma CW&#39;, &#39;Google Sans&#39;,=-apple-system, BlinkMacSystemFont, &#39;Segoe
    UI&#39;, Roboto, Oxygen, Ubu=ntu, Cantarell, &#39;Open Sans&#39;, &#39;Helvetica Neue&#39;,
    sans-serif; background-color: #F1F3F5 !important; color: #233858; margin: 0;" bgcolor="#F1F3F5">
   
    <div class="root">
        <div class="container mt_11" style="max-width: 720px; display: block; margin: 0
            auto;">
            <table role="presentation" class="email_table"  width="100%" border="0" cellspacing="0"
                cellpadding="0" style="width: 100%; min-width: 100%;">
                <tbody>
                    <tr>
                        <td class="email_body" style="font-size: 0 !important; line-height: 100%; text-align:
                            center; padding-left: 8px; padding-right: 8px;" align"center">
                            <div class="email_container" style="font-size: 0; display: inline-block; width: 100%;
                                min-width: 0 !important; vertical-align: top;max-width: 660px; text-align: center;
                                margin: 0 auto;" align="center">
                                <table role="presentation" class="column jumbotron_b" width"100%" border="0"
                                    cellspacing="0" cellpadding="0" style="width: 100%; min-width: 100%;
                                    border-radius: 6px;">
                                    <tbody>
                                        <tr>
                                            <td class="column_cell tl content-area jumbotron_cell" style="width:
                                                100%; min-width: 100%; padding-left: 8px; padding-right: 8px;
                                                vertical-align: top; padding-top: 32px; border-radius: 3px; text-align:
                                                left; background: no-repeat 50%; border: 0;" align="left"
                                                valign="top">
                                               
                                                <h1 style="color: #233858; font-size: 24px; line-height: 36px;
                                                    font-weight: 800; font-family: &#39;BR Firma CW&#39;, &#39;Google
                                                    Sans&#39;, -apple-system, BlinkMacSystemFont, &#39;Segoe UI&#39;,
                                                    Roboto, Oxygen, Ubuntu, Cant=arell, &#39;Open Sans&#39;,
                                                    &#39;Helvetica Neue&#39;, sans-serif !important; margin: 32px 0
                                                    14px; padding: 0;"><b>Hello {{ $kycs->user->name }},</b>
                                                </h1>
                                                
                                                <p style="font-size: 16px; font-family: &#39;BR Firma CW&#39;,
                                                    &#39;Google Sans&#39;, sans-serif; -webkit-font-smoothing:
                                                    antialiased; line-height:1.6; color: rgba(10,46,101,0.8);
                                                    margin-top: 0; margin-bottom: 30px;">
                                                      Your account have been aproved. You can now Login with your email address and  password
                                                      <div>
                                                        <tr>
                                                            {{-- <td style="margin:auto 60%; background:#19006D; padding:10px 100px;"> --}}
                                                                <a href="{{ url('https://www.evokeedgelimited.com/login') }}" style="color:#fff;">Login</a>
                                                            {{-- </td> --}}
                                                        </tr>
                                                      </div>
                                                </p>
                                                
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
          
        </div>
       
       
        <!-- footer -->
        <div class="email_container" style="font-size: 0; display: inline-block; width: 100%;
                                min-width: 0 !important; vertical-align: top;max-width: 660px; text-align: center;
                                margin: 0 auto;" align="center">
            <table role="presentation" class="column" width="100%" border=" 0"
                cellspacing="0" cellpadding="0" style="width: 100%; min-width: 100%; padding:50px 0px 50px;">
                <tbody>
                    <tr>
                        <td class="column_cell content-area logo_mark tl" style="width: 100%;
                            min-width: 100%; padding-left: px; padding-right: px; vertical-align:
                            top; text-align: center;" align="center" valign="top">
                            <a href="https://evokeedgelimited.com/"
                                style="font-family: &#39;BR Firma CW&#39;, &#39;Google Sans&#39;,
                                sans-serif; -webkit-font-smoothing: antialiased; color: #233858;
                                text-decoration: underline;">
                                <img src="https://evokeedgelimited.com/assets/img/black-logo.png" style="width: 129px; height: auto; max-width: 200px;" />
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table role="presentation" class="email_table" width="100%" border="0" cellspacing="0"
                cellpadding="0" style="width: 100%; min-width: 100%;text-align:center;">
                <tbody>  
                    <tr>
                        <td class="column_cell jumbotron_cell tc" align="center" valign="top">
                            <p style="font-size: 16px; font-family: &#39;BR Firma CW&#39;,
                                &#39;Google Sans&#39;, sans-serif; -webkit-font-smoothing:
                                antialiased; line-height: 1.6; color: rgba(10,46,101,0.8);
                                margin-top: 0; margin-bottom: 30px;text-align:center'">
                               © 2023 EvokeEdge Limited. All Rights Reserved
                           </p>
                        </td>
                    </tr>
                <tr>
                    <td>
                        <p style="font-size: 16px; font-family: &#39;BR Firma CW&#39;,
                            &#39;Google Sans&#39;, sans-serif; -webkit-font-smoothing:
                            antialiased; line-height: 1.6; color: rgba(10,46,101,0.8);
                            margin-top: 0; margin-bottom: 30px;">
                            <b>CONFIDENTIALITY NOTICE:</b> 
                            This email and any accompanying attachments contain confidential and privileged 
                            information intended solely for the intended recipient(s). 
                            if you have received this email in error, please promptly notify us and delete the 
                            email and any attachments from your records. unauthorized printing, copying, distribution, 
                            or disclosure of any part of this email or its attachments is strictly prohibited. your 
                            compliance in maintaining the confidentiality of this communication is required.
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>    
    </div>
</body>
</html>    