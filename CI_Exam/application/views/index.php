<div class="container mt-5">
    <?php if (!empty($this->session->flashdata('form_data'))) {
        $form_data = $this->session->flashdata('form_data');
    } ?>
    <form action="/assignments" method="POST" class="form d-flex justify-content-center align-items-center gap-5" id="filter">
        <h1><?php echo $num_rows ?> Assignments</h1>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Easy" id="easy" name="level1" <?php if (!empty($form_data['level1'])) echo "checked"; ?>>
            <label class="form-check-label" for="easy">
                Easy
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Intermediate" id="intermediate" name="level2" <?php if (!empty($form_data['level2'])) echo "checked"; ?>>
            <label class="form-check-label" for="intermediate">
                Intermediate
            </label>
        </div>
        <select name="track" class="form-select" style="width: auto;">
            <option value="" <?php if (empty($form_data['track'])) echo "selected"; ?>>All</option>
            <option value="Introduction" <?php if (!empty($form_data['track']) && $form_data['track'] == "Introduction") echo "selected"; ?>>Introduction</option>
            <option value="Web Fundamentals" <?php if (!empty($form_data['track']) && $form_data['track'] == "Web Fundamentals") echo "selected"; ?>>Web Fundamentals</option>
            <option value="PHP" <?php if (!empty($form_data['track']) && $form_data['track'] == "PHP") echo "selected"; ?>>PHP</option>
        </select>
    </form>
    <table class="table" id="assignments-table">
        <thead>
            <tr>
                <th>Assignment</th>
                <th>Sequence Num</th>
                <th>Level</th>
                <th>Track</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($datas)) {
                foreach ($datas as $data) { ?>
                    <tr>
                        <td><?php echo $data->assignment_name; ?></td>
                        <td><?php echo $data->sequence_num; ?></td>
                        <td><?php echo $data->level; ?></td>
                        <td><?php echo $data->track; ?></td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>