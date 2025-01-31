<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
  @vite(['resources/css/app.css','resources/js/app.js'])
  <link rel="icon" href="{{ asset('storage/images/Logo-KPB.png') }}" type="image/png">
  <title>KPB Gianyar</title>
</head>
<body>
  {{-- Header --}}
  @include('partials.navbar') 

  <div class="mt-8">
    <main class="pt-8 pb-16 lg:pt-16 bg-white antialiased">
      <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
          <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue">
            <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl">Memahami Makna filosofis Busana Adat Bali</h1>
            <address class="flex items-center mb-6 not-italic">
              <div class="inline-flex items-center mr-3 text-sm text-gray-900">
                  <img class="mr-4 w-12 h-12 rounded-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmKR37rcD-Efedtkrw_Ag-gousr8B7pNcOog&s" alt="Jese Leos">
                  <div>
                      <a href="#" rel="author" class="text-base font-bold text-gray-900">Triadi Adnyani</a>
                      <p class="text-base text-gray-500 text-sm">Asisten Pembina KPB Gianyar</p>
                      <p class="text-base text-gray-500 text-sm"><time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time></p>
                  </div>
              </div>
            </address>
            <figure>
              <img src="https://static.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/baliexpress/2017/12/pakaian-adat-ungkap-simbolik-dharma-ini-penjelasannya_m_35526.jpeg" alt="">
            <figcaption class="text-gray-400 text-sm mt-2">Digital art by Anonymous</figcaption>
            </figure>
            <p class="mt-1 text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec gravida sem eu odio laoreet laoreet. Etiam scelerisque tortor et sapien volutpat placerat. Ut non dapibus elit, at facilisis libero. In hac habitasse platea dictumst. Cras auctor urna sed mattis iaculis. Aliquam lobortis libero ullamcorper enim porta tincidunt in id mauris. Vestibulum ultricies feugiat congue.

              In ac nunc quam. Proin euismod ullamcorper turpis, at ullamcorper lectus eleifend id. Praesent dapibus nibh vel lorem vestibulum facilisis. Nullam vel gravida nisl. Maecenas non dignissim diam. Sed aliquet, mauris ut tempor pretium, elit nibh vestibulum neque, quis posuere dolor nunc nec elit. Mauris laoreet hendrerit felis vel posuere. Proin sagittis arcu erat, vel tempus enim euismod eget. Nunc id blandit purus. Curabitur molestie tellus sit amet tempus accumsan. Etiam non pharetra leo. Sed et tempor purus. Duis libero nulla, pharetra vel felis nec, faucibus pulvinar nulla. Etiam id lacus erat. Sed vitae est euismod, porttitor tellus sit amet, suscipit nunc.
              
              Aliquam interdum eleifend sapien, a euismod ipsum tempor sit amet. Ut tempus est ut erat venenatis, ut bibendum magna porta. Quisque tortor mi, varius ac ultricies eget, convallis ac urna. Nam tempus, mauris eu ultricies porttitor, ligula lorem ullamcorper erat, sed iaculis lacus libero at velit. Nunc condimentum leo felis, a fringilla erat lacinia eu. Suspendisse euismod egestas neque, ut elementum mi egestas in. Aenean elit odio, facilisis ac dignissim at, tempor at velit. Mauris at metus imperdiet sapien consectetur volutpat. Integer in scelerisque enim. Maecenas ornare sed ante sed euismod.
              
              Etiam consectetur consequat odio, id semper risus condimentum id. Curabitur imperdiet diam arcu, in laoreet tortor eleifend eget. Pellentesque at semper libero. Sed lobortis, velit ut gravida malesuada, libero odio viverra nisi, a faucibus nulla nulla at justo. Morbi egestas id lorem eu aliquam. Vivamus odio sem, convallis quis odio vel, ullamcorper efficitur odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse suscipit turpis ac molestie molestie.
              
              Maecenas pulvinar tellus ligula, ut sagittis massa semper a. Duis sollicitudin posuere sapien, et eleifend magna congue eu. Morbi ut arcu eget sapien sagittis euismod. Duis tristique, velit quis commodo pharetra, leo orci sodales massa, quis dapibus lorem mi eu odio. Maecenas pellentesque mattis finibus. Vivamus tortor nibh, molestie vel semper id, rhoncus ut dolor. Nullam convallis nisi sed tortor viverra tincidunt. Pellentesque vestibulum accumsan tellus vel condimentum. Aenean accumsan, lacus quis pharetra rhoncus, quam ex tristique mauris, id venenatis diam justo ornare nisl. Mauris sit amet consequat justo. Aliquam semper arcu at arcu fermentum, eget semper enim imperdiet. Pellentesque cursus interdum tellus, eu tincidunt erat mollis quis. Curabitur elementum diam ac justo varius vulputate. Donec ultrices augue euismod diam vehicula pellentesque.</p>
            {{-- <section class="not-format">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900">Discussion (20)</h2>
                </div>
                <form class="mb-6">
                    <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" rows="6"
                            class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0"
                            placeholder="Write a comment..." required></textarea>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800">
                        Post comment
                    </button>
                </form>
                <article class="p-6 mb-6 text-base bg-white rounded-lg">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900"><img
                                    class="mr-2 w-6 h-6 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                    alt="Michael Gough">Michael Gough</p>
                            <p class="text-sm text-gray-600"><time pubdate datetime="2022-02-08"
                                    title="February 8th, 2022">Feb. 8, 2022</time></p>
                        </div>
                        <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50"
                            type="button">
                              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                  <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                              </svg>
                            <span class="sr-only">Comment settings</span>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownComment1"
                            class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow">
                            <ul class="py-1 text-sm text-gray-700"
                                aria-labelledby="dropdownMenuIconHorizontalButton">
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 ">Edit</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100">Remove</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100">Report</a>
                                </li>
                            </ul>
                        </div>
                    </footer>
                    <p>Very straight-to-point article. Really worth time reading. Thank you! But tools are just the
                        instruments for the UX designers. The knowledge of the design tools are as important as the
                        creation of the design strategy.</p>
                    <div class="flex items-center mt-4 space-x-4">
                        <button type="button"
                            class="flex items-center font-medium text-sm text-gray-500 hover:underline">
                              <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                              <path d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z"/>
                              </svg>
                            Reply
                        </button>
                    </div>
                </article>
                <article class="p-6 mb-6 ml-6 lg:ml-12 text-base bg-white rounded-lg">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 "><img
                                    class="mr-2 w-6 h-6 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                    alt="Jese Leos">Jese Leos</p>
                            <p class="text-sm text-gray-600"><time pubdate datetime="2022-02-12"
                                    title="February 12th, 2022">Feb. 12, 2022</time></p>
                        </div>
                        <button id="dropdownComment2Button" data-dropdown-toggle="dropdownComment2"
                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50"
                            type="button">
                              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                  <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                              </svg>
                            <span class="sr-only">Comment settings</span>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownComment2"
                            class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownMenuIconHorizontalButton">
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                </li>
                            </ul>
                        </div>
                    </footer>
                    <p>Much appreciated! Glad you liked it ☺️</p>
                    <div class="flex items-center mt-4 space-x-4">
                        <button type="button"
                            class="flex items-center font-medium text-sm text-gray-500 hover:underline dark:text-gray-400">
                              <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                  <path d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z"/>
                              </svg>
                            Reply
                        </button>
                    </div>
                </article>
                <article class="p-6 mb-6 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white"><img
                                    class="mr-2 w-6 h-6 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-3.jpg"
                                    alt="Bonnie Green">Bonnie Green</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-03-12"
                                    title="March 12th, 2022">Mar. 12, 2022</time></p>
                        </div>
                        <button id="dropdownComment3Button" data-dropdown-toggle="dropdownComment3"
                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            type="button">
                              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                  <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                              </svg>
                            <span class="sr-only">Comment settings</span>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownComment3"
                            class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownMenuIconHorizontalButton">
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                </li>
                            </ul>
                        </div>
                    </footer>
                    <p>The article covers the essentials, challenges, myths and stages the UX designer should consider while creating the design strategy.</p>
                    <div class="flex items-center mt-4 space-x-4">
                        <button type="button"
                            class="flex items-center font-medium text-sm text-gray-500 hover:underline dark:text-gray-400">
                            <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                              <path d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z"/>
                            </svg>
                            Reply
                        </button>
                    </div>
                </article>
                <article class="p-6 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white"><img
                                    class="mr-2 w-6 h-6 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-4.jpg"
                                    alt="Helene Engels">Helene Engels</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-06-23"
                                    title="June 23rd, 2022">Jun. 23, 2022</time></p>
                        </div>
                        <button id="dropdownComment4Button" data-dropdown-toggle="dropdownComment4"
                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            type="button">
                              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                  <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                              </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownComment4"
                            class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownMenuIconHorizontalButton">
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                </li>
                            </ul>
                        </div>
                    </footer>
                    <p>Thanks for sharing this. I do came from the Backend development and explored some of the tools to design my Side Projects.</p>
                    <div class="flex items-center mt-4 space-x-4">
                        <button type="button"
                            class="flex items-center font-medium text-sm text-gray-500 hover:underline dark:text-gray-400">
                            <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                              <path d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z"/>
                            </svg>
                            Reply
                        </button>
                    </div>
                </article>
            </section> --}}
          </article>
      </div>
    </main>
    
    <aside aria-label="Blog lainnya" class="py-8 lg:py-24 bg-gray-50">
      <div class="px-4 mx-auto max-w-screen-xl">
          <h2 class="mb-8 text-3xl font-bold text-gray-900 text-center">Blog lainnya</h2>
          <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
              <article class="max-w-xs">
                  <a href="#">
                      <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-1.png" class="mb-2 rounded-lg" alt="Image 4">
                  </a>
                  <div class="mb-2 inline-block rounded-full bg-red-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm text-center">
                    KEBUDAYAAN
                  </div>
                  <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900">
                      <a href="#">Our first project with React</a>
                  </h2>
                  <p class="mb-4  text-gray-500">Over the past year, Volosoft has undergone many changes! After months of preparation.</p>
                  <div class="flex items-center justify-between">
                    <div class="flex items-center">
                      <img
                        alt="Triadi Adnyani"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmKR37rcD-Efedtkrw_Ag-gousr8B7pNcOog&s"
                        class="relative inline-block h-8 w-8 rounded-full object-cover"
                      />
                      <div class="flex flex-col ml-3 text-sm">
                        <span class="text-slate-800 font-semibold">Triadi Adnyani</span>
                        <span class="text-slate-600">
                          January 10, 2024
                        </span>
                      </div>
                    </div>
                  </div>
              </article>
              <article class="max-w-xs">
                  <a href="#">
                      <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-2.png" class="mb-2 rounded-lg" alt="Image 4">
                  </a>
                  <div class="mb-2 inline-block rounded-full bg-red-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm text-center">
                    KEBUDAYAAN
                  </div>
                  <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900">
                      <a href="#">Our first project with React</a>
                  </h2>
                  <p class="mb-4  text-gray-500">Over the past year, Volosoft has undergone many changes! After months of preparation.</p>
                  <div class="flex items-center justify-between">
                    <div class="flex items-center">
                      <img
                        alt="Triadi Adnyani"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmKR37rcD-Efedtkrw_Ag-gousr8B7pNcOog&s"
                        class="relative inline-block h-8 w-8 rounded-full object-cover"
                      />
                      <div class="flex flex-col ml-3 text-sm">
                        <span class="text-slate-800 font-semibold">Triadi Adnyani</span>
                        <span class="text-slate-600">
                          January 10, 2024
                        </span>
                      </div>
                    </div>
                  </div>
              </article>
              <article class="max-w-xs">
                  <a href="#">
                      <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-3.png" class="mb-2 rounded-lg" alt="Image 4">
                  </a>
                  <div class="mb-2 inline-block rounded-full bg-red-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm text-center">
                    KEBUDAYAAN
                  </div>
                  <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900">
                      <a href="#">Our first project with React</a>
                  </h2>
                  <p class="mb-4  text-gray-500">Over the past year, Volosoft has undergone many changes! After months of preparation.</p>
                  <div class="flex items-center justify-between">
                    <div class="flex items-center">
                      <img
                        alt="Triadi Adnyani"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmKR37rcD-Efedtkrw_Ag-gousr8B7pNcOog&s"
                        class="relative inline-block h-8 w-8 rounded-full object-cover"
                      />
                      <div class="flex flex-col ml-3 text-sm">
                        <span class="text-slate-800 font-semibold">Triadi Adnyani</span>
                        <span class="text-slate-600">
                          January 10, 2024
                        </span>
                      </div>
                    </div>
                  </div>
              </article>
              <article class="max-w-xs">
                  <a href="#">
                      <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-4.png" class="mb-2 rounded-lg" alt="Image 4">
                  </a>
                  <div class="mb-2 inline-block rounded-full bg-red-700 py-0.5 px-2.5 border border-transparent text-xs text-white transition-all shadow-sm text-center">
                    KEBUDAYAAN
                  </div>
                  <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900">
                      <a href="#">Our first project with React</a>
                  </h2>
                  <p class="mb-4  text-gray-500">Over the past year, Volosoft has undergone many changes! After months of preparation.</p>
                  <div class="flex items-center justify-between">
                    <div class="flex items-center">
                      <img
                        alt="Triadi Adnyani"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmKR37rcD-Efedtkrw_Ag-gousr8B7pNcOog&s"
                        class="relative inline-block h-8 w-8 rounded-full object-cover"
                      />
                      <div class="flex flex-col ml-3 text-sm">
                        <span class="text-slate-800 font-semibold">Triadi Adnyani</span>
                        <span class="text-slate-600">
                          January 10, 2024
                        </span>
                      </div>
                    </div>
                  </div>
              </article>
          </div>
      </div>
    </aside>
  </div>

  {{-- Footer --}}
  @include('partials.footer') 
</body>
</html>