<h1 align="center">ramsey/devtools</h1>

<p align="center">
    <strong>A Composer plugin to aid PHP library and application development.</strong>
</p>

<p align="center">
    <a href="https://github.com/ramsey/devtools"><img src="http://img.shields.io/badge/source-ramsey/devtools-blue.svg?style=flat-square" alt="Source Code"></a>
    <a href="https://packagist.org/packages/ramsey/devtools"><img src="https://img.shields.io/packagist/v/ramsey/devtools.svg?style=flat-square&label=release" alt="Download Package"></a>
    <a href="https://php.net"><img src="https://img.shields.io/packagist/php-v/ramsey/devtools.svg?label=%E2%80%8B&style=flat-square&colorB=%238892BF&logoWidth=22&logo=data%3Aimage%2Fsvg%2Bxml%3Bbase64%2CPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgdmlld0JveD0iMCAwIDM4NyAxODUiIGZpbGw9IndoaXRlIj48cGF0aCBkPSJNNzcuMzYsNjEuNzVjMTIuMDYyLC0wIDIwLjEwMSwyLjIyNyAyNC4xMjEsNi42OGM0LjAxNiw0LjQ1MyA0Ljk3MywxMi4wOTggMi44NzEsMjIuOTNjLTIuMTk1LDExLjI4MSAtNi40MjIsMTkuMzMyIC0xMi42ODcsMjQuMTU2Yy02LjI2Niw0LjgyNSAtMTUuODAxLDcuMjM1IC0yOC42MDIsNy4yMzVsLTE5LjMxMywwbDExLjg1NiwtNjEuMDAxbDIxLjc1NCwtMFptLTc3LjM2LDEyMi43NTFsMzEuNzUsMGw3LjUzMiwtMzguNzVsMjcuMTk1LDBjMTIsMCAyMS44NzEsLTEuMjU4IDI5LjYyMSwtMy43ODJjNy43NSwtMi41MTkgMTQuNzkzLC02Ljc0NyAyMS4xMzMsLTEyLjY4YzUuMzIsLTQuODkgOS42MjUsLTEwLjI4NCAxMi45MjIsLTE2LjE4NGMzLjI5MywtNS44OTMgNS42MzMsLTEyLjQwMiA3LjAxNSwtMTkuNTE5YzMuMzYsLTE3LjI3NyAwLjgyNSwtMzAuNzM0IC03LjU5NywtNDAuMzc1Yy04LjQyMiwtOS42NCAtMjEuODIxLC0xNC40NjEgLTQwLjE4OCwtMTQuNDYxbC02MS4wNTQsLTBsLTI4LjMyOSwxNDUuNzUxWiIvPjxwYXRoIGQ9Ik0xNjAuNDg3LC0wbDMxLjUsLTBsLTcuNTMxLDM4Ljc1bDI4LjA2MiwtMGMxNy42NTYsLTAgMjkuODM2LDMuMDgyIDM2LjUzOSw5LjIzOWM2LjcwMyw2LjE2IDguNzExLDE2LjE0IDYuMDMxLDI5LjkzN2wtMTMuMTc5LDY3LjgyNWwtMzIsMGwxMi41MzEsLTY0LjQ4OWMxLjQyNiwtNy4zMzYgMC45MDIsLTEyLjM0IC0xLjU3NCwtMTUuMDA4Yy0yLjQ3NywtMi42NjggLTcuNzQ2LC00LjAwNCAtMTUuODA1LC00LjAwNGwtMjUuMTc2LC0wbC0xNi4yMjYsODMuNTAxbC0zMS41LDBsMjguMzI4LC0xNDUuNzUxWiIvPjxwYXRoIGQ9Ik0zMjUuMTc1LDYxLjc1YzEyLjA2MywtMCAyMC4xMDIsMi4yMjcgMjQuMTIxLDYuNjhjNC4wMTcsNC40NTMgNC45NzMsMTIuMDk4IDIuODcxLDIyLjkzYy0yLjE5NSwxMS4yODEgLTYuNDIsMTkuMzMyIC0xMi42ODcsMjQuMTU2Yy02LjI2Niw0LjgyNSAtMTUuODAxLDcuMjM1IC0yOC42MDEsNy4yMzVsLTE5LjMxMiwwbDExLjg1NCwtNjEuMDAxbDIxLjc1NCwtMFptLTc3LjM1OCwxMjIuNzUxbDMxLjc1LDBsNy41MywtMzguNzVsMjcuMTk1LDBjMTIsMCAyMS44NzIsLTEuMjU4IDI5LjYyMiwtMy43ODJjNy43NSwtMi41MTkgMTQuNzkzLC02Ljc0NyAyMS4xMzIsLTEyLjY4YzUuMzIxLC00Ljg5IDkuNjI1LC0xMC4yODQgMTIuOTIyLC0xNi4xODRjMy4yOTMsLTUuODkzIDUuNjMzLC0xMi40MDIgNy4wMTYsLTE5LjUxOWMzLjM1OSwtMTcuMjc3IDAuODI1LC0zMC43MzQgLTcuNTk4LC00MC4zNzVjLTguNDIyLC05LjY0IC0yMS44MTksLTE0LjQ2MSAtNDAuMTg3LC0xNC40NjFsLTYxLjA1NSwtMGwtMjguMzI3LDE0NS43NTFaIi8%2BPC9zdmc%2B" alt="PHP Programming Language"></a>
    <a href="https://github.com/ramsey/devtools/actions?query=workflow%3Amain"><img src="https://img.shields.io/github/workflow/status/ramsey/devtools/main?logo=github&style=flat-square" alt="Build Status"></a>
    <a href="https://codecov.io/gh/ramsey/devtools"><img src="https://img.shields.io/codecov/c/gh/ramsey/devtools?label=codecov&logo=codecov&style=flat-square" alt="Codecov Code Coverage"></a>
    <a href="https://shepherd.dev/github/ramsey/devtools"><img src="https://img.shields.io/endpoint?style=flat-square&url=https%3A%2F%2Fshepherd.dev%2Fgithub%2Framsey%2Fdevtools%2Fcoverage" alt="Psalm Type Coverage"></a>
    <a href="https://github.com/ramsey/devtools/blob/master/LICENSE"><img src="https://img.shields.io/packagist/l/ramsey/devtools.svg?style=flat-square&colorB=darkcyan" alt="Read License"></a>
    <a href="https://packagist.org/packages/ramsey/devtools/stats"><img src="https://img.shields.io/packagist/dt/ramsey/devtools.svg?style=flat-square&colorB=darkmagenta" alt="Package downloads on Packagist"></a>
    <a href="https://phpc.chat/channel/ramsey"><img src="https://img.shields.io/badge/phpc.chat-%23ramsey-darkslateblue?style=flat-square&logo=data%3Aimage%2Fsvg%2Bxml%3Bbase64%2CPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzMzQgMzM0IiB2ZXJzaW9uPSIxLjEiPjxnPjxwYXRoIGZpbGw9IiM0RTlBMDYiIGQ9Ik0xNzQuMTYyLDQuNjkzYy0yLjI1NCwxLjQyMSAtMy41MzMsMy41MTcgLTMuNDkxLDUuNzU5bDAuNTcxLDI5Ljc3YzAuMDc5LDQuMjIxIDMuODA4LDcuOTcxIDkuMDM3LDguOTkyYzE4LjQxMywzLjYwNCAzNS4wNDYsMTMuMTUgNDcuMjE3LDI3LjU3OWMzLjY0Niw0LjMyNSA5Ljk3OSw2LjMyNSAxNS4yMzMsNC43NzVsMzkuMzQ2LC0xMS42MDhjMy4xMzMsLTAuOTIxIDUuMjQ2LC0zLjA2NyA1Ljc4NywtNS44MzNjMC41MzQsLTIuNzM0IC0wLjUyNSwtNS43ODggLTIuODU4LC04LjM2N2MtMTMuNzE3LC0xNS4xMzggLTMwLjIyMSwtMjcuNTU0IC00Ny44NDIsLTM2LjQyMWMtMTcuMTkxLC04LjY1NCAtMzUuOTk1LC0xNC4yIC01NC44MDgsLTE2LjMzM2MtMi45NzEsLTAuMzM4IC01Ljk1NCwwLjI3NSAtOC4xOTIsMS42ODdaIi8%2BPHBhdGggZmlsbD0iI0YwQzA0MCIgZD0iTTI5MC44MjEsODMuMzkzbC00MC4zOTYsMTIuMzc5Yy01LjM5NiwxLjY1NSAtOC4yNDYsNi43NDYgLTYuODM0LDEyLjQzNGMwLjM4OCwxLjU1IDAuODI2LDMuMzgzIDEuMTQyLDUuMTg3YzMuNDM4LDE5LjQ1OSAtMC40MjUsMzkuMDIxIC0xMS45NjYsNTYuMTM4Yy0zLjg1LDUuNzEyIC0zLjEzLDE0LjI5MSAxLjkyNSwyMC43NzFsNDMuNTQxLDU1Ljc4M2MzLjk4OCw1LjEwNCA5LjMzNCw4LjM5MiAxNC41ODgsOC45MjFjNS4yNjYsMC41MjkgOS44MDgsLTEuNzY3IDEyLjQwNCwtNi4yMjVjMjUuMTkyLC00My4zNzUgMjguMjU0LC05Mi4xNSAxMy42MjksLTEzNS4zODhjLTIuMzUsLTYuOTQxIC01LjI4NywtMTMuOTM3IC04LjY5NiwtMjAuNzgzYy0xLjY3MSwtMy4zNTQgLTQuNzcxLC02LjI4MyAtOC40ODcsLTguMDMzYy0zLjY4LC0xLjczOCAtNy42MzQsLTIuMTY3IC0xMC44NSwtMS4xODRaIi8%2BPHBhdGggZmlsbD0iIzg4OTJCRiIgZD0iTTE5OS44NzUsMTk3LjYzOWMtMTEuMTc1LDUuMjUgLTIzLjY4Myw4LjA2NyAtMzUuOTk2LDguMDY3Yy0xMi4zMTIsMCAtMjQuODE3LC0yLjgxNyAtMzUuOTkyLC04LjA2N2MtNi41NzUsLTMuMDgzIC0xNC41ODcsLTAuNTU4IC0xOS41Nyw2LjIyNWwtNDMuMiw1OC45MDRjLTMuOTU5LDUuNDA0IC02LjE4OCwxMi4zNjMgLTYuMDQ2LDE5LjFjMC4xNSw2Ljg4NCAyLjc2MiwxMi43OTIgNy4xNzUsMTYuMDk2YzI3Ljk1NCwyMC44NjcgNjIuMiwzMi40NTQgOTcuNjMzLDMyLjQ1NGMzNS40MjksMCA2OS42ODMsLTExLjU4NyA5Ny42MzMsLTMyLjQ1NGM0LjQxNywtMy4zMDQgNy4wMjUsLTkuMjEyIDcuMTc1LC0xNi4wOTZjMC4xNDYsLTYuNzM3IC0yLjA4MywtMTMuNzA0IC02LjA0NSwtMTkuMWwtNDMuMiwtNTguOTA0Yy00Ljk4LC02Ljc4MyAtMTIuOTkyLC05LjMwOCAtMTkuNTY3LC02LjIyNVoiLz48cGF0aCBmaWxsPSIjODA4Qzk1IiBkPSJNMTA2Ljg3NSwxMjYuODQ3YzAsLTMzLjgyIDI3LjQxNywtNjEuMjM3IDYxLjIzMywtNjEuMjM3YzMzLjgyMSwwIDYxLjIzNCwyNy40MTcgNjEuMjM0LDYxLjIzN2MwLDMzLjgxNyAtMjcuNDEzLDYxLjIzIC02MS4yMzQsNjEuMjNjLTMzLjgxNiwwIC02MS4yMzMsLTI3LjQxMyAtNjEuMjMzLC02MS4yM1oiLz48cGF0aCBmaWxsPSIjRDFEM0Q0IiBkPSJNMTMxLjIxNyw3OS41MDZsMi40MiwtMi4wMTNsMC44MDUsMC44MDRsLTEuNDA5LDIuMDE3bDIuMjE3LC0wLjJsMC44MDQsLTIuMjIxbDIuNjI1LC0yLjAxMmwyLjA1NCwtMy43NTRjLTQuOTYyLDIuNDg3IC05LjUyOSw1LjYyOSAtMTMuNjEyLDkuMzE2bDQuMDk2LDAuMjg0bDAsLTIuMjIxWm0xNS4xMiwtOC4wNjNsMC42MDksMS42MTNsNC42MzcsLTIuMjE3bC00LjAzMyw0LjAzM2wyLjQxNywwLjgwNWw0Ljg0MSwtMC40MDVsMC40LC0yLjIxNmwyLjIxNywtMS44MTNsNS42NDYsLTQuMjMzbDEuMDA4LC0xLjE5NmMtNC41NSwwLjI5NiAtOC45NjcsMS4wNTggLTEzLjE5MiwyLjI5NmwwLjA4OCwwLjMxMmwtNC42MzgsMy4wMjFabS0yMi45NzksOTEuMTI1bDIuMjE3LC0wLjQwNGwtMS44MTcsLTkuNjc1bDIuODI1LC01LjY1bC0wLjgwOCwtMy42MjVsLTEuODEzLC0wLjgwOGwtMi44MjUsLTYuMDQ2bC0yLjYyLC0xLjYxM2wtMS44MTMsLTEuNDEybC0yLjIxNywtMy4yMjVsLTAuMjA0LC00LjIzM2wtMC44MDQsLTQuMDM0bC0xLjgxNywtMi42MTZsLTAuNDA0LC0yLjYyMWwtMS44MTIsLTIuMDIxbC0xLjAzNCwtMS4yMjVjLTAuOTc5LDQuMzQyIC0xLjUzNyw4Ljg0NiAtMS41MzcsMTMuNDg3YzAsMTYuOTY3IDYuOTA4LDMyLjMyMSAxOC4wNjIsNDMuNDA5bC0xLjc4MywtNS44NzVsMC4yMDQsLTEuODEzWm0xMDUuNzM0LC00MC43MTZsLTIuMzEzLC00LjQ0MmwtMy4yMjUsLTguMjY3bC0xLjQxMiwtMS44MTJsLTMuNjMsLTQuNjM4bC0xLjQwOCwwLjJsLTIuNDIxLDAuNjA5bC0yLjQyMSwtMS44MTdsLTEuNDEyLDEuMDA4bC00LjYzOCwtNC42MzdsLTEuMDA0LDAuNjA0bDEuNDEzLDEuNDA4bDEuMjA4LDEuODE3bDEuNjEzLDAuODA4bDAsMi4wMTNsMi4wMTYsLTAuMmwxLjIwOSwtMS42MTNsMC4zMiwwLjY0NmwwLjQ4NCwwLjk2N2wyLjYyMSwyLjIyMWwwLjQwNCw0LjQzM2wtMi42MjEsMi44MjVsLTAuMiwxLjYwOGwtMi4wMTcsMS42MTNsLTMuODI5LDIuNjIxbC0yLjIyMSwtNS4yNDJsLTEuNjA4LC0yLjIxN2wtMS44MTcsLTEuNDEybC0xLjIwOCwtMy42MjVsLTIuMDE3LC0yLjIxN2wtNC4wMzMsLTQuNDM3bDEuNjA4LDMuODI5bDIuNjI1LDMuODI5bDEuNDEzLDMuMjI5bDIuNjIxLDQuMDI5bDMuNDQxLDMuOTY3bDAuNTkyLDAuNjc1bDEuMDA4LDIuNDE3bDYuMDQ2LC0yLjQxN2wtMC4yLDIuNDE3bDEuMTU4LC0wLjA1NWwtMC40MDQsMS44MjFsLTEuNzYyLDAuNDU0bC0xLjAwOSw2LjI0NmwtMy4yMjksMy42MjlsMC40MDQsMy4yM2wtNC42MzcsNy4yNTRsMS4wMDgsNS4yNDFsLTEuNDA4LDYuMjVsLTIuNDIxLDIuMDE3bC00LjIzMywzLjIyMWwtMC42MDksNC40NDJsLTIuNjE2LDEuNDA4bC0xLjYxMywyLjYyNWwtMi44MjksMi42MTJsLTQuMDI1LDIuMDE3bC00LjAzMywwLjYwNGwtMi4wMTcsMC44MTNsLTIuMDEyLC0xLjQxN2wwLjQsLTEuMjA0bC0xLjIwOSwtMi40MjVsLTAuODA4LC0yLjIxM2wtMC42MDQsLTMuODI5bC0xLjMwOSwtMC4zMDRsMCwtMS4wMDhsMC43MDUsLTAuNTA0bC0xLjQxMywtMi44MjVsMS42MTMsLTUuMjQybDEuNjEyLC0wLjgwOGwtMC42MDQsLTQuMDNsLTEuNDEzLC0yLjYybC0zLjAyLC0zLjgzbC0xLjEwOSwtMC4xNWwwLC0xLjAwOGwwLjUsLTAuNjU4bDEuNDEzLC0zLjQyMWwtMS40MTMsLTIuNDI1bC0wLjIsLTYuNDVsLTEuNDEyLDAuODA0bC0xLjgxMywwbC0xLjgxMiwtMi4yMTJsLTQuMDM0LDBsLTMuODI5LDEuNDA4bC0xLjYxMiwtMS4yMDhsLTMuNjI5LDAuMjA0bC0yLjAxNywwLjRsLTQuNjM4LC0zLjQyOWwtMC40MDQsLTIuMjEzbC0zLjIyNSwtMy44MzNsLTAuODA4LC0zLjIyOWwxLjgxMiwtNC4yM2wwLC01LjA0MWwzLjYzNCwtNS4yNDJsNS44NDYsLTQuNDMzbC0wLjYwNSwtMS40MTNsNC44MzgsLTMuNjI5bDMuNjI5LDBsMy4yMjUsLTEuNDEybDguNDY3LC0wLjJsLTAuNjA0LDIuNDE2bDEuODE2LDEuMDEzbDMuMjI1LDIuNDE2bDQuMDI5LDEuMDA5bC0wLjIsLTEuODE3bDEuNjEzLC0xLjQwOGwyLjAxNywxLjIwOGw0LjIzMywxLjQxM2wyLjIxNywtMC44MDlsMi40MiwwLjJsLTEuNjEyLC0yLjIxMmwxLjgxMiwtMS4yMTNsLTEuMjA4LC0xLjIwOGwtMi4yMTcsMGwtMi4wMTYsMC4ybC0xLjYxMywtMC42MDRsLTEuMjA4LC0wLjgwOWwtMC44MDgsLTEuMjA0bC0wLjIsLTEuNDEybC0wLjgwNSwtMC40MDRsLTEuNjE2LDAuODA0bDEuNjE2LDAuNjA0bDAuNCwxLjYxMmwtMS4yMDgsMS4wMDlsLTEuNDEyLC0wLjYwNGwtMi42MjUsMC4yMDRsMCwtMS4wMTNsMS42MTYsLTAuNmwtMC42MDQsLTEuNDEybC0yLjQyMSwtMC4ybDAuNjA5LDAuODA0bC0wLjgwOSwxLjQwOGwtMS4yMTIsMS4wMTNsLTEuNDA5LC0wLjQwNGwtMS4wMDgsLTEuMjA5bDIuNDE3LDBsMC4yMDQsLTAuODA4bC0xLjAwOCwtMS4wMDhsLTEuMjA5LC0wLjgwOWwtMS42MTIsLTEuMDA4bC0wLjgwOSwtMS42MDhsLTIuODIsMC44MDRsLTIuMDE3LDBsLTAuODA4LDEuODEybC0yLjAxMywwLjgwOWwtMC42MDgsMS44MTZsLTIuNDE3LDEuMDA0bC0yLjYyMSwwbC0yLjQyMSwwbC0wLjYwNCwtMS4yMDRsMC4yLC0xLjgxNmwxLjAwOSwtMS4yMTNsMCwtMS44MTJsMS4yMDgsLTAuNjA5bDUuMjQ2LDAuNjA5bDAuNCwtMS40MDlsLTIuMjE3LC0wLjIwNGwtMi4yMTcsLTAuNjA0bDIuNDE3LC0xLjYxN2wzLjQyOSwtMC42MDRsMS44MTMsLTEuMjA4bDEuNDEyLC0xLjAwOWwyLjYyMSwtMC44MDRsMC42MDQsLTEuNDEybDEuMjEzLDEuMDA4bDEuNjEyLDAuODA4bDEuODEzLC0wLjYwOGwxLjYxMiwtMC44MDRsMS40MDksLTEuODEzbC0xLjQwOSwtMC40MDhsLTAuNjA0LC0xLjIwOGwwLjYwNCwtMS40MDlsLTEuNjEyLC0wLjIwNGwwLDEuMDA5bC0zLjAyNSwwLjYwNGwxLjYxMiwwLjIwNGwxLjYxMywxLjQxMmwtMS4wMDksMi4wMTNsLTIuMDEyLC0wLjJsLTEuNDEzLC0xLjgxM2wtMS42MTIsMC44MDVsLTEuMjA4LC0xLjAwOWwwLC0xLjIwOGwzLjgyOSwtMi4wMTdsMi4yMjEsLTIuMDE2bDQuMjI5LDAuNGwtMS40MDksLTEuNjEzbDQuNjc1LC0wLjc0NmMyNS41MTMsNS45NTQgNDQuODYzLDI3LjgyMSA0Ny4wMyw1NC41ODRaIi8%2BPC9nPjwvc3ZnPg%3D%3D" alt="Chat with the maintainers"></a>
</p>

## About

I created this [Composer](https://getcomposer.org) plugin because I got tired of
making changes to development tools and scripts in my repositories, only to find
I liked the change so much, I now needed to apply it to all my repositories.
This is an effort to consolidate and simplify.

These tools might not be for you, and that's okay.

Maybe these tools help a lot, but you have different needs. That's also okay.
Feel free to fork this repository, change the package name, and make your own
devtools.

Of course, if you want to help improve these tools, I welcome your contributions.
Feel free to open issues, ask about or request features, and submit PRs. I can't
wait to see what you come up with.

This project adheres to a [code of conduct](CODE_OF_CONDUCT.md).
By participating in this project and its community, you are expected to
uphold this code.

## Installation

Install this package as a development dependency using
[Composer](https://getcomposer.org).

``` bash
composer require --dev ramsey/devtools
```

## Usage

This package is a Composer plugin. This means Composer recognizes that it
provides custom functionality to your `composer` command. After installation,
type `composer list`, and you'll see a lot of new commands that this plugin
provides.

``` bash
composer list
```

> You may additionally (or alternately) use `./vendor/bin/devtools` to access
> the commands within this plugin.

### Add a Command Prefix

The commands this plugin provides are all intermingled with the rest of the
Composer commands, so it may be hard to find them all. We have a way to group
them by command namespace, though. Open `composer.json` and add a
`ramsey/devtools.command-prefix` property to the `extra` section. You may use
any prefix you wish.

``` json
{
    "extra": {
        "ramsey/devtools": {
            "command-prefix": "my-prefix"
        }
    }
}
```

Now, when you type `composer list` (or just `composer`), you'll see a section
of commands that looks like this:

```
 my-prefix
  my-prefix:analyze             Performs static analysis checks on the code base.
  my-prefix:analyze:phpstan     Runs the PHPStan static analyzer.
  my-prefix:analyze:psalm       Runs the Psalm static analyzer.
  my-prefix:build:clean         Removes everything from the build directory that is not under version control.
  my-prefix:build:clear-cache   Removes everything from build/cache that is not under version control.
  my-prefix:lint                Checks source code for coding standards issues.
  my-prefix:lint:fix            Checks source code for coding standards issues and fixes them, if possible.
  my-prefix:test:all            Runs linting, static analysis, and unit tests.
  my-prefix:test:coverage:ci    Runs the unit test suite and generates a Clover coverage report.
  my-prefix:test:coverage:html  Runs the unit test suite and generates an HTML coverage report.
  my-prefix:test:unit           Runs the unit test suite.
```

You can also list commands by command prefix with `composer list my-prefix`.

### Extending or Overriding ramsey/devtools Commands

Maybe the commands ramsey/devtools provides don't do everything you need, or
maybe you want to replace them entirely. The configuration allows you to do
this!

Using the `ramsey/devtools.commands` property in the `extra` section of
`composer.json`, you may specify any command (*without* your custom prefix, if
you've configured one) as having other scripts to run, in addition to the
command's default behavior, or you may override the default behavior entirely.

Specifying additional scripts works exactly like
[writing custom commands](https://getcomposer.org/doc/articles/scripts.md#writing-custom-commands)
in `composer.json`, but the location is different. Everything you can do with
a custom Composer command, you can do here because they're the same thing.

``` json
{
    "extra": {
        "ramsey/devtools": {
            "commands": {
                "lint": {
                    "script": "@mylint"
                },
                "test:all": {
                    "script": [
                        "@mylint",
                        "@phpbench"
                    ]
                }
            }
        }
    },
    "scripts": {
        "mylint": "parallel-lint src tests",
        "phpbench": "phpbench run"
    }
}
```

In this way, when you run `composer lint` or `composer test:all`, it will
execute the default behavior first and then run your additional commands. To
override the default behavior so that it doesn't run at all and only your
scripts run, specify the `override` property and set it to `true`.

``` json
{
    "extra": {
        "ramsey/devtools": {
            "commands": {
                "lint": {
                    "override": true,
                    "script": "parallel-lint src tests"
                }
            }
        }
    }
}
```

### Composer Command Autocompletion

Did you know you can set up your terminal to do Composer command autocompletion?

If you'd like to have Composer command autocompletion, you may use
[bamarni/symfony-console-autocomplete](https://github.com/bamarni/symfony-console-autocomplete).
Install it globally with Composer:

``` bash
composer global require bamarni/symfony-console-autocomplete
```

Then, in your shell configuration file — usually `~/.bash_profile` or `~/.zshrc`,
but it could be different depending on your settings — ensure that your global
Composer `bin` directory is in your `PATH`, and evaluate the
`symfony-autocomplete` command. This will look like this:

``` bash
export PATH="$(composer config home)/vendor/bin:$PATH"
eval "$(symfony-autocomplete)"
```

Now, you can use the `tab` key to auto-complete Composer commands:

``` bash
composer my-prefix:[TAB][TAB]
```

## Contributing

Contributions are welcome! Before contributing to this project, familiarize
yourself with [CONTRIBUTING.md](CONTRIBUTING.md).

To develop this project, you will need [PHP](https://www.php.net) 7.4 or greater
and [Composer](https://getcomposer.org).

After cloning this repository locally, execute the following commands:

``` bash
cd /path/to/repository
composer install
```

Now, you are ready to develop!

### Tooling

This project uses [CaptainHook](https://github.com/CaptainHookPhp/captainhook)
to validate all staged changes prior to commit.

#### Commands

To see all the commands available for contributing to this project:

``` bash
composer devtools
```

#### Coding Standards

This project follows a superset of [PSR-12](https://www.php-fig.org/psr/psr-12/)
coding standards, enforced by [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer).
The project PHP_CodeSniffer configuration may be found in `phpcs.xml.dist`.

CaptainHook will run PHP_CodeSniffer before committing. It will attempt to fix
any errors it can, and it will reject the commit if there are any un-fixable
issues. Many issues can be fixed automatically and will be done so pre-commit.

You may lint the entire codebase using PHP_CodeSniffer with the following
commands:

``` bash
# Lint
composer devtools lint

# Lint and autofix
composer devtools lint:fix
```

#### Static Analysis

This project uses a combination of [PHPStan](https://github.com/phpstan/phpstan)
and [Psalm](https://github.com/vimeo/psalm) to provide static analysis of PHP
code. Configurations for these are in `phpstan.neon.dist` and `psalm.xml`,
respectively.

CaptainHook will run PHPStan and Psalm before committing. The pre-commit hook
does not attempt to fix any static analysis errors. Instead, the commit will
fail, and you must fix the errors manually.

You may run static analysis manually across the whole codebase with the
following command:

``` bash
# Static analysis
composer devtools analyze
```

#### Project Structure

This project uses [pds/skeleton](https://github.com/php-pds/skeleton) as its
base folder structure and layout.

## Copyright and License

The ramsey/devtools library is copyright © [Ben Ramsey](https://benramsey.com)
and licensed for use under the terms of the
MIT License (MIT). Please see [LICENSE](LICENSE) for more information.
