@extends('front.layouts.app')
@section('content')

<div id="header" class="bg-[#F6F7FA] relative">
    <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
        <x-navbar />
        <div class="flex flex-col gap-[50px] items-center py-20">
            <div class="breadcrumb flex items-center justify-center gap-[30px]">
              <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Home</p>
              <span class="text-cp-light-grey">/</span>
              <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Blog</p>
              <span class="text-cp-light-grey">/</span>
              <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">{{ $blog->title }}</p>
            </div>
          </div>

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
            <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <a href="/blog" class="font-medium text-xs text-blue-600 hover:underline">&laquo; Back to all blogs </a>
                    <address class="flex items-center my-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="{{ $blog->author}}" />
                            <div>
                                <a href="/blog?author={{ $blog->author }}" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $blog->author }}</a>
                                <p class="text-base text-gray-500 dark:text-gray-400 mb-1">{{ $blog->created_at->diffForHumans() }}</p>
                                <a href="/blog?category={{ $blog->category->slug }}">
                                    <span class="text-white text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800 hover:underline" style="background-color: {{ $blog->category->color }};">
                                        {{ $blog->category->name }}
                                    </span>
                                </a>
                            </div>
                        </div>
                    </address>
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $blog->title }}</h1>
                </header>

                <div class="prose dark:prose-invert">
                    <p>{!! $blog->content !!}</p>
                </div>
            </article>
        </div>
    </main>
    </div>
</div>
    @endsection

