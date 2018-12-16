<?php 
	use Carbon\Carbon;

	if(!function_exists('numberToPriceFormat'))
	{
	    /**
	     * @param null $number
	     * @return string
	     */
	    function numberToPriceFormat($number = null)
	 
	    {
	        return number_format((float)$number, 2, '.', '') . ' $';
	    }
	}
	if(!function_exists('dateToFrFormat'))
	{
	    /**
	     * Permet de formater la date vers la format françaices
	     * @param null $date
	     * @return string
	     */
	    function dateToFrFormat($date = null)
	    {
	        return \Carbon\Carbon::parse($date)->format('d / m / Y');
	    }
	}
	if(!function_exists('dateTimeToFrFormat'))
	{
	    /**
	     * Permet de formater la date vers la format françaices
	     * @param null $date
	     * @return string
	     */
	    function dateTimeToFrFormat($date = null)
	    {
	        return \Carbon\Carbon::parse($date)->format('d / m / Y à H');
	    }
	}
	if(!function_exists('sendMailLv'))
	{
	    function sendMailLv($params)
	    {
	        $title = $params['title'];
	        $content = $params['content'];
	        $to = $params['to'];
	        Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message) use ($to) {
	            $message->from('booking@gmail.com', 'Mouad ZIANI');
	            $message->to($to);
	        });
	    }
	}
	if(!function_exists('sendMail'))
	{
	    function sendMail($params)
	    {
	        $to      = $params['to'];
			$subject = 'Access bookig site';
			$message = $params['content'];
			$headers = 'From: booking@contact.com' . "\r\n" .
			    'Reply-To: booking@contact.com' . "\r\n";
			return mail($to, $subject, $message, $headers);
	    }
	}