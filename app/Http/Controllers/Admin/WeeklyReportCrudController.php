<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\WeeklyReportRequest;
use App\Models\Position;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class WeeklyReportCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class WeeklyReportCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\WeeklyReport::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/weeklyreport');
        CRUD::setEntityNameStrings('weekly report', 'weekly reports');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->enableExportButtons();
        CRUD::column('user_id')->type('select')->entity('userId')->attribute('name')->model('App\Models\User');
        CRUD::column('position_id')->type('select')->entity('positionId')->attribute('name')->model('App\Models\Position');
        CRUD::column('created_at')->type('text')->label('Timestamp');
        CRUD::column('roadblock')->type('text');
        CRUD::column('issue')->type('text');
        CRUD::column('improvement')->type('text');
        CRUD::column('recomendation')->type('text');
        CRUD::column('newdevelop')->type('table')->columns([
            'what' => 'What is that',
            'duedate' => 'Due date',
            'projectname' => 'Project Name',
            'requestedby' => 'Requested by',
        ])->label('New Development');
        CRUD::column('additionalreq')->type('table')->columns([
            'indevelop' => 'In Development',
            'additional' => 'Additional Requirement',
            'acceptable' => 'Acceptable (X)',
            'unacceptable' => 'Unacceptable (x) Why?',
        ])->label('Additional requirement');
        CRUD::column('developpipeline')->type('table')->columns([
            'nameproject' => 'Name of Project',
            'stage' => 'Stage',
            'duedate' => 'Due date',
            'additional' => 'Additional information',
        ])->label('Development pipeline');
        CRUD::column('activitiespastweek')->type('table')->columns([
            'activity' => 'Activity',
            'date' => 'Date',
        ])->label('Top activities past week');
        CRUD::column('activitiesnextweek')->type('table')->columns([
            'activity' => 'Activity',
            'date' => 'Date',
        ])->label('Top activities next week');
        $this->crud->addFilter([
            'name' => 'user_id',
            'type' => 'select2',
            'label' => 'User',
        ], function () {
            return User::all()->pluck('name', 'id')->toArray();
        }, function ($value) {
            $value = json_decode($value);
            if (!empty($value)) {
                $this->crud->addClause('where', 'user_id', $value);
            }
        });
        $this->crud->addFilter([
            'name' => 'position_id',
            'type' => 'select2',
            'label' => 'Position',
        ], function () {
            return Position::all()->pluck('name', 'id')->toArray();
        }, function ($value) {
            $value = json_decode($value);
            if (!empty($value)) {
                $this->crud->addClause('where', 'position_id', $value);
            }
        });
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(WeeklyReportRequest::class);

        CRUD::field('user_id')->type('select2')->entity('userId')->attribute('name')->model('App\Models\User');
        CRUD::field('position_id')->type('select2')->entity('positionId')->attribute('name')->model('App\Models\Position');
        CRUD::field('roadblock')->type('textarea');
        CRUD::field('issue')->type('textarea');
        CRUD::field('improvement')->type('textarea');
        CRUD::field('recomendation')->type('textarea');
        CRUD::field('newdevelop')->type('table')->entity_singular('New Development')->columns([
            'what' => 'What is that',
            'duedate' => 'Due date',
            'projectname' => 'Project Name',
            'requestedby' => 'Requested by',
        ])->min(1)->label('New Development :');
        CRUD::field('additionalreq')->type('table')->entity_singular('Additional requirement')->columns([
            'indevelop' => 'In Development',
            'additional' => 'Additional Requirement',
            'acceptable' => 'Acceptable (X)',
            'unacceptable' => 'Unacceptable (x) Why?',
        ])->min(1)->label('Additional requirement from existing development :');
        CRUD::field('developpipeline')->type('table')->entity_singular('Development pipeline')->columns([
            'nameproject' => 'Name of Project',
            'stage' => 'Stage',
            'duedate' => 'Due date',
            'additional' => 'Additional information',
        ])->min(1)->label('Development pipeline :');
        CRUD::field('activitiespastweek')->type('table')->entity_singular('Activity')->columns([
            'activity' => 'Activity',
            'date' => 'Date',
        ])->min(1)->label('Top activities past week :');
        CRUD::field('activitiesnextweek')->type('table')->entity_singular('Activity')->columns([
            'activity' => 'Activity',
            'date' => 'Date',
        ])->min(1)->label('Top activities next week :');
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }
}
