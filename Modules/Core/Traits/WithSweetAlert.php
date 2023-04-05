<?php

namespace Modules\Core\Traits;

use Jantinnerezo\LivewireAlert\LivewireAlert;

trait WithSweetAlert
{
    use LivewireAlert;

    public function alertConfirm(array $data, string $title = 'Are you sure?', $options = [])
    {
        if (!isset($data['isConfirmed'])) {
            $this->alert('warning', $title, array_merge(
                [
                    'position' => 'center',
                    'timer' => '',
                    'showConfirmButton' => true,
                    'onConfirmed' => $data['listener'],
                    'showCancelButton' => true,
                    'confirmButtonText' => 'Yes',
                    'inputAttributes' => $data
                ],
                $options,
            ));
            return false;
        } elseif ($data['data']['inputAttributes']) {
            return $data['data']['inputAttributes'];
        }
    }
}