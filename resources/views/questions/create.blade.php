@extends('layouts.master')

@section('content')
    <h2>Add Questions</h2>
    <hr>

    <div class="row">
        <div class="col-md-8">

            <label for="question_type">Question Type:</label>
            <select name="question_type" id="question_type" class="form-control" style="width: 200px">
                <option value="text">Text</option>
                <option value="mcq">MCQs (Multiple Choose)</option>
            </select>
            <hr>

            <form action="{{ route('question.store') }}" id="text" method="post">
                @csrf
                <div class="form-group" id="text-form-div"></div>
                <a class="btn btn-link" id="text_question">Add Question</a>
            </form>

            <form action="{{ route('question.store') }}" method="post" id="mcq" style="display: none;">
                @csrf
                <input type="hidden" name="questionnaier_id" value="{{ request()->route()->id }}">
                <div class="form-group" id="mcq-form-div"></div>
                <button class="btn btn-link" id="mcq_question">Add Question</button>
            </form>

        </div>
    </div>
@endsection

@section('script')
    <script>

        $('#question_type').on('change', function () {

            if ($(this).val() == 'mcq') {
                $("#text").hide();
                $("#mcq").show();

            } else if ($(this).val() == 'text') {
                $("#mcq").hide();
                $("#text").show();
            }

        });

        // Add Text Question

        $("#text_question").on('click', function (e) {
            e.preventDefault();

            var template = "<div class='row'><div class='col-md-8'>" +
                "<label for='question'>Question: </label>" +
                "<input type='text' name='question' placeholder='Enter Question' class='form-control'>" +
                "<label for='answer'>Answer: </label>" +
                "<input type='text' name='answer' placeholder='Enter Answer' class='form-control'><br>" +
                "<input type='hidden' name='questionnaier_id' value='{{ request()->route()->id }}'>" +
                "<button type='submit' class='btn btn-default'>Save Question</button>" +
                "</div>" +
                "<div class='col-md-4'><br><br><a href='' id='delete_text_question'>Delete Question</a> </div></div>";

            $('#text-form-div').append(template);

            $('#delete_text_question').on('click', function (e) {
                e.preventDefault();
                $('#text-form-div').remove();
            })

        });


        // Add MCQs question
        $("#mcq_question").on('click', function (e) {
            e.preventDefault();

            var template = "<div class='row'><div class='col-md-8'>" +
                "<label for='question'>Question: </label>" +
                "<input type='text' name='question' placeholder='Enter Question' class='form-control'>" +
                "<div class='choice_place'>" + "</div><br><br>" +
                "<a href='' id='add_choice'>Add Choice</a><br><br>" +
                "<button type='submit' class='btn btn-default'>Save Question</button>" +
                "</div>" +
                "<div class='col-md-4'><br><br><a href='' id='delete_mcq_question'>Delete Question</a> </div></div>";

            $('#mcq-form-div').append(template);

            // Add Choice
            var choices_index = 1;
            $("#add_choice").on('click', function (e) {
                e.preventDefault();

                var template =
                    "<div data-index='%index%'><span>Choice %index%</span> " +
                    "<input type='text' name='answer[%index%][choice]' placeholder='Enter Choice' class='form-control'> " +
                    "<input type='checkbox' name='answer[%index%][is_correct]'> " +
                    "Correct? " +
                    "<a href='#' class='delete_choice' >Delete Choice</a><br></div>";

                template = template.replace(/%index%/g, choices_index);
                choices_index++;

                $('.choice_place').append(template);
            });

            // Delete choice
            $('#delete_mcq_question').on('click', function(e) {
                e.preventDefault();
                $('#mcq-form-div').remove();
            });

            $('.delete_choice').on('click', function(e) {
                e.preventDefault();
//                $('#mcq-form-div').remove();
//                alert("Choice deleted");
            });

        });

    </script>
@endsection