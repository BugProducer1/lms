<div class="container">
    <h2>{{ $course->Title }}</h2>
    <p>{{ $course->ShortDescription }}</p>
    <div>
        <h4>Course Description</h4>
        <p>{{ $course->CourseDescription }}</p>
    </div>

    <div>
        <h4>Learning Outcomes</h4>
        <ul>
            @foreach ($course->learningOutcomes as $outcome)
                <li>{{ $outcome->title }}</li>
            @endforeach
        </ul>
    </div>

    <div>
        <h4>Curriculum</h4>
        @foreach ($course->topics as $topic)
            <h5>{{ $topic->title }}</h5>
            <ul>
                @foreach ($topic->lessons as $lesson)
                    <li>{{ $lesson->title }} — {{ $lesson->lessonDescription }}</li>
                @endforeach
            </ul>
        @endforeach
    </div>

    <div>
        <h4>Quiz</h4>
        @foreach ($course->questions as $question)
            <p><strong>{{ $question->question }}</strong></p>
            <ul>
                @foreach ($question->choices as $choice)
                    <li>{{ $choice->choice_text }}
                        @if ($choice->is_correct)
                            <strong>(Correct)</strong>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endforeach
    </div>
</div>
