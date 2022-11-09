<?php

class Controller_Admin extends Controller_Template
{

	public function action_news()
	{
		$data['subnav'] = array('news'=> 'active' );
		$this->template->title = 'Admin &raquo; News';
        $data['news'] = Model_News::find([
            'order_by' => ['created_at' => 'desc']
        ]);

        $this->template->content = View::forge('admin/news', $data);
	}

	public function action_add()
	{
		$data['subnav'] = array('add'=> 'active' );
		$this->template->title = 'Admin &raquo; Add';
		$this->template->content = View::forge('admin/add', $data);
    }

    public function post_add()
    {
        $title = Input::post('title');
        $short_description = Input::post('short_description');
        $full_content = Input::post('full_content');
        $author = Input::post('author');
        $model = new Model_News();
        $model->title = $title;
        $model->short_description = $short_description;
        $model->full_content = $full_content;
        $model->author = $author;
        $model->save();
        Response::redirect('admin/news');
    }

	public function action_edit($id)
	{
        $new = Model_News::find('first', [
            'where' => [
                'new_id' => $id
            ]
        ]);

        if ($new == null) {
            throw new HttpNotFoundException();
        }

        if (Input::post('update')) {
            $val = Validation::forge();

            $val->add('title', 'Title')->add_rule('required')
                ->add_rule('min_length', 3)
                ->add_rule('max_length', 40);

            $val->add('short_description', 'Short_description')->add_rule('required')
                ->add_rule('min_length', 3)
                ->add_rule('max_length', 140);

            $val->add('full_content', 'Full_content')->add_rule('required')
                ->add_rule('min_length', 3)
                ->add_rule('max_length', 250);

            $val->add('author', 'Author')->add_rule('required')
                ->add_rule('min_length', 3)
                ->add_rule('max_length', 40);

            if ($val->run()) {
                // get an array of successfully validated fields => value pairs
                $validatedFields = $val->validated();
                //update existing student model values and save to db    
                $new->roll_no = $validatedFields['roll_no'];
                $new->name = $validatedFields['name'];
                $new->save();
                //redirect to New List
                Response::redirect('admin/news');
            } else {
                // get an array of validation errors as field => error pairs
                //set error
                $data['errors'] = $val->error();
                //set student value to last filled values
                $new->roll_no = Input::post('roll_no');
                $new->name = Input::post('name');
                $data['New'] = $new;
                $this->template->title = "Edit New";
                $this->template->content = View::forge('admin/edit', $data, false);
            }
        } else {
            $data['subnav'] = ['edit' => 'active'];
            $this->template->title = 'Admin &raquo; Edit';
            $this->template->content = View::forge('admin/edit', $data);
        }
	}

	public function action_delete($id)
	{
        $new = Model_News::find('first', [
            'where' => [
                'new_id' => $id
            ]
        ]);

        if ($new == null) {
            throw new HttpNotFoundException();
        }

        $new->delete();

        Response::redirect('admin/news');

		$data['subnav'] = array('delete'=> 'active' );
		$this->template->title = 'Admin &raquo; Delete';
		$this->template->content = View::forge('admin/delete', $data);
	}

}
