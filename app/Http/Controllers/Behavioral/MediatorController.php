<?php

namespace App\Http\Controllers\Behavioral;

use App\Commands\ButtonCommand;
use App\Commands\InformationZoneCommand;
use App\Commands\PopupMenuCommand;
use App\Mediators\FormMediator;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Throwable;
use Illuminate\Http\JsonResponse;

/**
 * Class MediatorController
 * @package App\Http\Controllers\Behavioral
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class MediatorController
{
    /**
     * @var FormMediator
     */
    private $form;

    /**
     * MediatorController constructor.
     * @param FormMediator $form
     */
    public function __construct(FormMediator $form)
    {
        $this->form = $form;
    }

    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $menu = (new PopupMenuCommand('CoMonetary'))
            ->addOption('Without co-monetary')
            ->addOption('co-monetary');

        $button = new ButtonCommand('Ok');

        $this->form
            ->addControl(new InformationZoneCommand('First Name'))
            ->addControl(new InformationZoneCommand('Last Name'))
            ->addControl($menu)
            ->setMenuCoMonetary($menu)
            ->addControl($button)
            ->setButton($button)
            ->addCoMonetaryControl(new InformationZoneCommand('Co-monetary first name'))
            ->addCoMonetaryControl(new InformationZoneCommand('Co-monetary last name'));

        try {
            return response()->json([
                'options' => $this->form->notify()
            ], HttpResponse::HTTP_OK);
        } catch (Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], HttpResponse::HTTP_BAD_REQUEST);
        }
    }
}