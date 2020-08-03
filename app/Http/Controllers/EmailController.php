<?php


namespace NPDashboard\Http\Controllers;

use NPDashboard\Repositories\CustomersRepository;

class EmailController extends Controller
{
    /**
     * @param CustomersRepository $repository
     * @return \Illuminate\Contracts\View\View
     */
    public function showMailPage(CustomersRepository $repository)
    {
        (isset($this->request->all()['customer_id']))
            ?  $email = ($repository->find($this->request->all()['customer_id']))->usuario:$email = "";
        return view('pages.email.page', ["email" => $email]);
    }

    /**
     * @return \NPCore\Http\Redirect
     */
    public function sendMail()
    {
        $args = $this->request->all();
        $from = config()['email']['defaults']['from'];
        $to = $args['email_to'];
        $subject = $args['subject'];
        $message = $this->buildEmailBody($args['message']);
        np_log('sendMail', [
            'type' => "cliente",
            'email' => $to
        ]);
        email($to, $from, $subject, $message);
        return redirect('home');
    }

    /**
     * @param $message
     * @return string
     */
    private function buildEmailBody($message)
    {
        return '<html><head><title>NoPing Tunnel</title></head><body>' . $message . '</body></html>';
    }
}