<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="sunset">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>
<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">

    {{-- NAVBAR mobile only --}}
    <x-nav sticky class="lg:hidden">
        <x-slot:brand>
            PhyreXAMP
        </x-slot:brand>
        <x-slot:actions>
            <label for="main-drawer" class="lg:hidden me-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-nav>

    {{-- MAIN --}}
    <x-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" class="bg-base-300">

            {{-- BRAND --}}
            <div class="pl-4 pt-4">
                <svg class="w-32" viewBox="0 0 508 95" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M117.52 22.8C124.917 22.8 130.592 24.2187 134.544 27.056C138.547 29.8427 140.548 34.0227 140.548 39.596C140.548 42.636 139.991 45.2453 138.876 47.424C137.812 49.552 136.241 51.3 134.164 52.668C132.137 53.9853 129.655 54.948 126.716 55.556C123.777 56.164 120.459 56.468 116.76 56.468H110.908V76H103.536V24.092C105.613 23.5853 107.919 23.256 110.452 23.104C113.036 22.9013 115.392 22.8 117.52 22.8ZM118.128 29.26C114.987 29.26 112.58 29.336 110.908 29.488V50.16H116.456C118.989 50.16 121.269 50.008 123.296 49.704C125.323 49.3493 127.02 48.792 128.388 48.032C129.807 47.2213 130.896 46.132 131.656 44.764C132.416 43.396 132.796 41.648 132.796 39.52C132.796 37.4933 132.391 35.8213 131.58 34.504C130.82 33.1867 129.756 32.148 128.388 31.388C127.071 30.5773 125.525 30.02 123.752 29.716C121.979 29.412 120.104 29.26 118.128 29.26ZM149.318 76V18.24L156.386 17.024V37.24C157.704 36.7333 159.097 36.3533 160.566 36.1C162.086 35.796 163.581 35.644 165.05 35.644C168.192 35.644 170.801 36.1 172.878 37.012C174.956 37.8733 176.602 39.1147 177.818 40.736C179.085 42.3067 179.972 44.2067 180.478 46.436C180.985 48.6653 181.238 51.1227 181.238 53.808V76H174.17V55.328C174.17 52.896 173.993 50.8187 173.638 49.096C173.334 47.3733 172.802 45.98 172.042 44.916C171.282 43.852 170.269 43.092 169.002 42.636C167.736 42.1293 166.165 41.876 164.29 41.876C163.53 41.876 162.745 41.9267 161.934 42.028C161.124 42.1293 160.338 42.256 159.578 42.408C158.869 42.5093 158.21 42.636 157.602 42.788C157.045 42.94 156.64 43.0667 156.386 43.168V76H149.318ZM186.839 83.372C187.396 83.6253 188.105 83.8533 188.967 84.056C189.879 84.3093 190.765 84.436 191.627 84.436C194.413 84.436 196.592 83.8027 198.163 82.536C199.733 81.32 201.152 79.3187 202.419 76.532C199.227 70.452 196.237 64.0173 193.451 57.228C190.715 50.388 188.435 43.472 186.611 36.48H194.211C194.768 38.76 195.427 41.2173 196.187 43.852C196.997 46.4867 197.884 49.1973 198.847 51.984C199.809 54.7707 200.848 57.5573 201.963 60.344C203.077 63.1307 204.243 65.816 205.459 68.4C207.384 63.08 209.056 57.8107 210.475 52.592C211.893 47.3733 213.236 42.0027 214.503 36.48H221.799C219.975 43.928 217.948 51.0973 215.719 57.988C213.489 64.828 211.083 71.2373 208.499 77.216C207.485 79.496 206.421 81.4467 205.307 83.068C204.243 84.74 203.052 86.108 201.735 87.172C200.417 88.236 198.923 89.0213 197.251 89.528C195.629 90.0347 193.78 90.288 191.703 90.288C191.145 90.288 190.563 90.2373 189.955 90.136C189.347 90.0853 188.739 89.984 188.131 89.832C187.573 89.7307 187.041 89.604 186.535 89.452C186.079 89.3 185.749 89.1733 185.547 89.072L186.839 83.372ZM243.844 35.644C244.452 35.644 245.136 35.6947 245.896 35.796C246.707 35.8467 247.492 35.948 248.252 36.1C249.012 36.2013 249.696 36.328 250.304 36.48C250.963 36.5813 251.444 36.6827 251.748 36.784L250.532 42.94C249.975 42.7373 249.037 42.5093 247.72 42.256C246.453 41.952 244.807 41.8 242.78 41.8C241.463 41.8 240.145 41.952 238.828 42.256C237.561 42.5093 236.725 42.6867 236.32 42.788V76H229.252V38.152C230.924 37.544 233.001 36.9867 235.484 36.48C237.967 35.9227 240.753 35.644 243.844 35.644ZM256.364 56.316C256.364 52.82 256.871 49.78 257.884 47.196C258.898 44.5613 260.24 42.3827 261.912 40.66C263.584 38.9373 265.51 37.6453 267.688 36.784C269.867 35.9227 272.096 35.492 274.376 35.492C279.696 35.492 283.775 37.164 286.612 40.508C289.45 43.8013 290.868 48.8427 290.868 55.632C290.868 55.936 290.868 56.3413 290.868 56.848C290.868 57.304 290.843 57.7347 290.792 58.14H263.736C264.04 62.244 265.231 65.36 267.308 67.488C269.386 69.616 272.628 70.68 277.036 70.68C279.519 70.68 281.596 70.4773 283.268 70.072C284.991 69.616 286.283 69.1853 287.144 68.78L288.132 74.708C287.271 75.164 285.751 75.6453 283.572 76.152C281.444 76.6587 279.012 76.912 276.276 76.912C272.831 76.912 269.842 76.4053 267.308 75.392C264.826 74.328 262.774 72.884 261.152 71.06C259.531 69.236 258.315 67.0827 257.504 64.6C256.744 62.0667 256.364 59.3053 256.364 56.316ZM283.496 52.44C283.547 49.248 282.736 46.6387 281.064 44.612C279.443 42.5347 277.188 41.496 274.3 41.496C272.679 41.496 271.235 41.8253 269.968 42.484C268.752 43.092 267.714 43.9027 266.852 44.916C265.991 45.9293 265.307 47.0947 264.8 48.412C264.344 49.7293 264.04 51.072 263.888 52.44H283.496ZM333.093 76C332.333 74.48 331.421 72.808 330.357 70.984C329.293 69.1093 328.128 67.184 326.861 65.208C325.595 63.1813 324.277 61.18 322.909 59.204C321.541 57.1773 320.224 55.2773 318.957 53.504C317.691 55.2773 316.373 57.1773 315.005 59.204C313.637 61.18 312.32 63.1813 311.053 65.208C309.837 67.184 308.672 69.1093 307.557 70.984C306.493 72.808 305.581 74.48 304.821 76H296.689C298.969 71.5413 301.604 67.0067 304.593 62.396C307.633 57.7853 310.851 53.048 314.245 48.184L297.373 23.332H305.885L318.881 42.94L331.725 23.332H340.161L323.593 47.88C327.039 52.7947 330.281 57.5827 333.321 62.244C336.361 66.9053 339.047 71.4907 341.377 76H333.093ZM386.689 76C385.828 73.72 385.017 71.4907 384.257 69.312C383.497 67.0827 382.712 64.828 381.901 62.548H358.037L353.249 76H345.573C347.6 70.4267 349.5 65.284 351.273 60.572C353.046 55.8093 354.769 51.3 356.441 47.044C358.164 42.788 359.861 38.7347 361.533 34.884C363.205 30.9827 364.953 27.132 366.777 23.332H373.541C375.365 27.132 377.113 30.9827 378.785 34.884C380.457 38.7347 382.129 42.788 383.801 47.044C385.524 51.3 387.272 55.8093 389.045 60.572C390.818 65.284 392.718 70.4267 394.745 76H386.689ZM379.773 56.468C378.152 52.06 376.53 47.804 374.909 43.7C373.338 39.5453 371.692 35.568 369.969 31.768C368.196 35.568 366.498 39.5453 364.877 43.7C363.306 47.804 361.736 52.06 360.165 56.468H379.773ZM425.531 68.704C425.025 67.488 424.341 65.9427 423.479 64.068C422.669 62.1933 421.782 60.1667 420.819 57.988C419.857 55.8093 418.818 53.58 417.703 51.3C416.639 48.9693 415.626 46.7907 414.663 44.764C413.701 42.6867 412.789 40.8373 411.927 39.216C411.117 37.5947 410.458 36.3533 409.951 35.492C409.394 41.4707 408.938 47.956 408.583 54.948C408.229 61.8893 407.925 68.9067 407.671 76H400.451C400.654 71.44 400.882 66.8547 401.135 62.244C401.389 57.5827 401.667 53.0227 401.971 48.564C402.326 44.0547 402.681 39.672 403.035 35.416C403.441 31.16 403.871 27.132 404.327 23.332H410.787C412.155 25.5613 413.625 28.196 415.195 31.236C416.766 34.276 418.337 37.468 419.907 40.812C421.478 44.1053 422.998 47.424 424.467 50.768C425.937 54.0613 427.279 57.076 428.495 59.812C429.711 57.076 431.054 54.0613 432.523 50.768C433.993 47.424 435.513 44.1053 437.083 40.812C438.654 37.468 440.225 34.276 441.795 31.236C443.366 28.196 444.835 25.5613 446.203 23.332H452.663C454.386 40.3053 455.678 57.8613 456.539 76H449.319C449.066 68.9067 448.762 61.8893 448.407 54.948C448.053 47.956 447.597 41.4707 447.039 35.492C446.533 36.3533 445.849 37.5947 444.987 39.216C444.177 40.8373 443.29 42.6867 442.327 44.764C441.365 46.7907 440.326 48.9693 439.211 51.3C438.147 53.58 437.134 55.8093 436.171 57.988C435.209 60.1667 434.297 62.1933 433.435 64.068C432.625 65.9427 431.966 67.488 431.459 68.704H425.531ZM482.083 22.8C489.48 22.8 495.155 24.2187 499.107 27.056C503.109 29.8427 505.111 34.0227 505.111 39.596C505.111 42.636 504.553 45.2453 503.438 47.424C502.375 49.552 500.804 51.3 498.727 52.668C496.7 53.9853 494.217 54.948 491.279 55.556C488.34 56.164 485.021 56.468 481.323 56.468H475.471V76H468.099V24.092C470.176 23.5853 472.481 23.256 475.015 23.104C477.599 22.9013 479.955 22.8 482.083 22.8ZM482.691 29.26C479.549 29.26 477.143 29.336 475.471 29.488V50.16H481.019C483.552 50.16 485.832 50.008 487.859 49.704C489.885 49.3493 491.583 48.792 492.951 48.032C494.369 47.2213 495.459 46.132 496.219 44.764C496.979 43.396 497.359 41.648 497.359 39.52C497.359 37.4933 496.953 35.8213 496.143 34.504C495.383 33.1867 494.319 32.148 492.951 31.388C491.633 30.5773 490.088 30.02 488.315 29.716C486.541 29.412 484.667 29.26 482.691 29.26Z" fill="url(#paint0_linear_1_5)"/>
                    <path d="M74.1873 67.6092C70.9043 78.4409 56.8095 89.353 50.1726 93.4108C59.7785 85.5603 56.7082 72.9091 53.9724 67.6092C55.9179 67.6092 58.4308 70.756 59.4441 72.3294C70.5395 68.8513 59.5961 36.8035 59.4441 37.7972C59.2921 38.7909 50.4766 52.9516 52.4525 47.2377C54.4283 41.5237 39.2292 20.9038 34.5174 20.9038C30.748 20.9038 23.9287 32.1661 20.9902 37.7972L25.0939 44.8776C15.0017 43.5857 8.83083 30.1786 7.00693 23.6366C14.0492 15.3969 29.4105 -0.858919 34.5174 0.0354392C40.9011 1.15339 61.42 25.8725 61.42 25.624C61.42 25.3756 67.3476 20.9038 67.3476 20.9038C67.3476 20.9038 72.262 33.4082 74.1873 38.791C75.5552 43.8838 77.4703 56.7775 74.1873 67.6092Z" fill="url(#paint1_linear_1_5)"/>
                    <path d="M26.0626 93.5872C33.7117 96.225 45.3382 94.5744 50.1726 93.4108C41.9973 94.3748 35.5851 88.5613 33.4236 85.5427C32.7152 86.3169 33.675 88.4628 34.2435 89.439C28.131 92.5879 13.0214 76.5632 13.6688 76.8646C14.3162 77.166 25.9634 78.8142 21.8395 77.5199C17.7155 76.2255 10.9645 62.6686 12.6802 60.7936C14.0528 59.2935 23.2461 60.6808 27.6713 61.5619L30.3955 65.7732C33.3007 61.2866 27.5597 53.9489 24.326 50.8409C16.8523 50.643 1.5733 50.8367 0.246561 53.1947C-1.41187 56.1421 5.8444 73.3087 5.69638 73.2182C5.54836 73.1278 0.725538 73.8583 0.725538 73.8583C0.725538 73.8583 6.38634 80.3673 8.89238 83.0935C11.4287 85.4924 18.4135 90.9495 26.0626 93.5872Z" fill="url(#paint2_linear_1_5)"/>
                    <defs>
                        <linearGradient id="paint0_linear_1_5" x1="-209.326" y1="-132.5" x2="505.638" y2="56.4378" gradientUnits="userSpaceOnUse">
                            <stop offset="0.684111" stop-color="#F2A231"/>
                            <stop offset="1" stop-color="#F95320"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_1_5" x1="14.4057" y1="53.8303" x2="50.4373" y2="101.29" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#F2A231"/>
                            <stop offset="1" stop-color="#F95320"/>
                        </linearGradient>
                        <linearGradient id="paint2_linear_1_5" x1="14.4057" y1="53.8303" x2="50.4373" y2="101.29" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#F2A231"/>
                            <stop offset="1" stop-color="#F95320"/>
                        </linearGradient>
                    </defs>
                </svg>
            </div>

            {{-- MENU --}}
            <x-menu activate-by-route>

                <x-menu-separator title="Virtual Hosts" icon="o-server" />
                @php
                $virtualHosts = \App\Models\VirtualHost::all()
                @endphp

                @if($virtualHosts->count())
                    @foreach($virtualHosts as $virtualHost)
                        <x-menu-item title="{{ $virtualHost->name }}" icon="o-server" link="" />
                    @endforeach
                @else
                    <label class="px-4 block text-xs text-base-content">No Virtual Hosts</label>
                @endif

            </x-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>

            <div class="mt-8">
                @livewire('xamp')
            </div>

            {{ $slot }}
        </x-slot:content>
    </x-main>

    {{--  TOAST area --}}
    <x-toast />

    {{-- Include AlpineJS --}}
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>