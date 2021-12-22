<?php
class Policy extends Controller
{

    public function __construct()
    {
        //new model instance
        $this->policyModel = $this->model('PolicyModel');
    }

    public function index()
    {
        $policies = $this->policyModel->getPolicy();
        $data = [
            'policies' => $policies
        ];

        $this->view('policy/index', $data);
    }

    //add new policy
    public function add()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validate = 0;
            $data = [
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'policy_number' => trim($_POST['policy_number']),
                'premium' => trim($_POST['premium']),
                'start_date' => trim($_POST['start_date']),
                'end_date' => trim($_POST['end_date'])
            ];

            //validate the first name
            if (empty($data['first_name'])) {
                $data['first_name_err'] = 'Please enter first name';
                $validate = 1;
            }
            //validate the last name
            if (empty($data['last_name'])) {
                $data['last_name_err'] = 'Please enter last name';
                $validate = 1;
            }
            //for policy number
            if (empty($data['policy_number'])) {
                $data['policy_number_err'] = 'Please enter policy number';
                $validate = 1;
            } else if (!ctype_digit(trim($data['policy_number']))) {
                $data['policy_number_err'] = 'Please enter valid numeric policy number';
                $validate = 1;
            }
            //validate the premium
            if (empty($data['premium'])) {
                $data['premium_err'] = 'Please enter premium';
                $validate = 1;
            } else if (!ctype_digit(trim($data['premium']))) {
                $data['premium_err'] = 'Please enter valid numeric premium';
                $validate = 1;
            }

            //validate the start date
            if (empty($data['start_date'])) {
                $data['start_date_err'] = 'Please enter start date';
                $validate = 1;
            }
            //validate the end date
            if (empty($data['end_date'])) {
                $data['end_date_err'] = 'Please enter end date';
                $validate = 1;
            }

            if (!empty($data['start_date']) && !empty($data['end_date'])) {
                if (strtotime($data['end_date']) < strtotime($data['start_date'])) {
                    $data['end_date_err'] = 'Please enter end date greater than start date';
                    $validate = 1;
                }
            }

            //validate error free
            if (!$validate) {
                if ($this->policyModel->addPolicy($data)) {
                    flash('policy_alert', 'Policy added sucessfully');
                    redirect('policy');
                } else {
                    die('something went wrong');
                }

                //laod view with error
            } else {
                $this->view('policy/add', $data);
            }
        } else {


            $this->view('policy/add', array());
        }
    }


    //edit policy
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validate = 0;
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'policy_number' => trim($_POST['policy_number']),
                'premium' => trim($_POST['premium']),
                'start_date' => trim($_POST['start_date']),
                'end_date' => trim($_POST['end_date'])
            ];

            //validate the first name
            if (empty($data['first_name'])) {
                $data['first_name_err'] = 'Please enter first name';
                $validate = 1;
            }
            //validate the last name
            if (empty($data['last_name'])) {
                $data['last_name_err'] = 'Please enter last name';
                $validate = 1;
            }
            //validate the policy number
            if (empty($data['policy_number'])) {
                $data['policy_number_err'] = 'Please enter policy number';
                $validate = 1;
            } else if (!ctype_digit(trim($data['policy_number']))) {
                $data['policy_number_err'] = 'Please enter valid numeric policy number';
                $validate = 1;
            }
            //validate the premium
            if (empty($data['premium'])) {
                $data['premium_err'] = 'Please enter premium';
                $validate = 1;
            } else if (!ctype_digit(trim($data['premium']))) {
                $data['premium_err'] = 'Please enter valid numeric premium';
                $validate = 1;
            }
            //validate the start date
            if (empty($data['start_date'])) {
                $data['start_date_err'] = 'Please enter start date';
                $validate = 1;
            }
            //validate the end date
            if (empty($data['end_date'])) {
                $data['end_date_err'] = 'Please enter end date';
                $validate = 1;
            }

            if (!empty($data['start_date']) && !empty($data['end_date'])) {
                if (strtotime($data['end_date']) < strtotime($data['start_date'])) {
                    $data['end_date_err'] = 'Please enter end date greater than start date';
                    $validate = 1;
                }
            }

            //validate error free
            if (!$validate) {
                if ($this->policyModel->updatePolicy($data)) {
                    flash('policy_alert', 'Policy updated');
                    redirect('policy');
                } else {
                    die('something went wrong');
                }
                //laod view with error
            } else {
                $this->view('policy/edit', $data);
            }
        } else {
            //call method from policy model
            $post = $this->policyModel->getPolicyById($id);

            $data = [
                'id' => $id,
                'first_name' => $post->first_name,
                'last_name' => $post->last_name,
                'policy_number' => $post->policy_number,
                'premium' => $post->premium,
                'start_date' => $post->start_date,
                'end_date' => $post->end_date
            ];

            $this->view('policy/edit', $data);
        }
    }

    //soft delete policy
    public function delete($id)
    {
        //soft delete
        if ($this->policyModel->softDeletePolicy($id)) {
            flash('policy_alert', 'Policy Removed');
            redirect('policy');
        } else {
            die('something went wrong');
        }
    }

    //remove from db 
    public function hardDelete($id)
    {
        //delete
        //here we need to verify authenic user only perfrom this operation
        if ($this->policyModel->deletePolicy($id)) {
            flash('policy_alert', 'Policy Removed');
            redirect('policy');
        } else {
            die('something went wrong');
        }
    }
}
