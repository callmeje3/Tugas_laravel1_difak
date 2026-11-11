@if ($paginator->hasPages())
    <style>
        .pgn {
            margin-top: 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 14px
        }

        .pgn-info {
            color: #9ca3af;
            font-size: .85rem;
            font-weight: 500
        }

        .pgn-info b {
            color: #4338ca;
            font-weight: 700
        }

        .pgn-btns {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
            justify-content: center
        }

        .pgn-btn {
            min-width: 40px;
            height: 40px;
            padding: 0 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #f3f4f6;
            color: #4b5563;
            font-weight: 600;
            font-size: .9rem;
            text-decoration: none;
            white-space: nowrap;
            transition: all .2s ease
        }

        .pgn-btn:hover {
            background: #e0e7ff;
            color: #4338ca
        }

        .pgn-btn.current,
        .pgn-btn.current:hover {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            transform: none;
            box-shadow: 0 6px 14px rgba(102, 126, 234, .35)
        }

        .pgn-btn.disabled,
        .pgn-btn.disabled:hover {
            color: #d1d5db;
            background: #f9fafb;
            cursor: not-allowed;
            transform: none;
            box-shadow: none
        }

        .pgn-dots {
            min-width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #d1d5db;
            font-weight: 700
        }

        @media (max-width: 480px) {
            .pgn-btn {
                min-width: 36px;
                height: 36px;
                padding: 0 10px;
                font-size: .85rem
            }
        }
    </style>

    <nav class="pgn" role="navigation" aria-label="Navigasi halaman">
        <span class="pgn-info">
            Menampilkan <b>{{ $paginator->firstItem() }}</b>–<b>{{ $paginator->lastItem() }}</b>
            dari <b>{{ $paginator->total() }}</b> produk
        </span>

        <div class="pgn-btns">
            @if ($paginator->onFirstPage())
                <span class="pgn-btn disabled" aria-disabled="true">« Sebelumnya</span>
            @else
                <a class="pgn-btn" href="{{ $paginator->previousPageUrl() }}" rel="prev">« Sebelumnya</a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="pgn-dots">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="pgn-btn current" aria-current="page">{{ $page }}</span>
                        @else
                            <a class="pgn-btn" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a class="pgn-btn" href="{{ $paginator->nextPageUrl() }}" rel="next">Berikutnya »</a>
            @else
                <span class="pgn-btn disabled" aria-disabled="true">Berikutnya »</span>
            @endif
        </div>
    </nav>
@endif
