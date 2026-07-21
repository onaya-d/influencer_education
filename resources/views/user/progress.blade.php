@extends('layouts.user')

@section('title', '授業進捗')

@section('content')

<a href="javascript:history.back()" class="back-link">
    ←戻る
</a>

<div class="user-info">

    <img
        src="{{ asset('images/' . $user->profile_image) }}"
        alt="プロフィール画像"
        class="profile-image"
    >

    <div>

        <h2 class="user-name">
            {{ $user->name }} さんの授業進捗
        </h2>

        <p class="grade-text">
            現在の学年：
            <span class="grade-badge">
                {{ $user->grade->name }}
            </span>
        </p>

    </div>

</div>

<div class="grade-list">

    @foreach ($grades as $grade)

        @php
            if ($grade->id <= 6) {
                $gradeClass = 'elementary';
            } elseif ($grade->id <= 9) {
                $gradeClass = 'junior';
            } else {
                $gradeClass = 'high';
            }
        @endphp

        <div class="grade-card">

            <div class="grade-title {{ $gradeClass }}">
                {{ $grade->name }}
            </div>

            @foreach ($grade->curriculums as $curriculum)

                <div class="curriculum-item">

                    @if (in_array($curriculum->id, $completedCurriculums))
                        <span class="completed">受講済</span>
                    @else
                        <span class="completed-space"></span>
                    @endif

                    <span class="curriculum-title">
                        {{ $curriculum->title }}
                    </span>

                </div>

            @endforeach

        </div>

    @endforeach

</div>

@endsection