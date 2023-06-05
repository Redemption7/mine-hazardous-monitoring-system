<?php

namespace App\Http\Livewire;

use App\Models\SensorData;
use Livewire\Component;

class PieChartGraph extends Component
{
    public $sensor_data;
    public $gas_data;
    public $clean;
    public $good;
    public $acceptable;
    public $heavy;
    public $harzadous;

    public function initializeData(){
        $this->clean = 0;
        $this->good = 0;
        $this->acceptable = 0;
        $this->heavy = 0;
        $this->harzadous = 0;
    }
    public function updateGraph(){
        $this->sensor_data = null;
        $this->sensor_data = SensorData::latest()->take(100)->get();
        $this->gas_data = SensorData::latest()->take(10)->pluck('gas')->toArray();

    }

    public function updateCount(){

        $this->updateGraph();

        if($this->sensor_data) {

            // queries for pie chart
            $this->clean = $this->sensor_data->where('dust', '<=', 1000)->count();

            $this->good = $this->sensor_data->where('dust', '>', 1000)
                ->where('dust', '<=', 4000)
                ->count();

            $this->acceptable = $this->sensor_data->where('dust', '>=', 4001)
                ->where('dust', '<=', 10000)
                ->count();

            $this->heavy = $this->sensor_data->where('dust', '>', 10000)
                ->where('dust', '<=', 20000)
                ->count();

            $this->harzadous = $this->sensor_data->where('dust', '>', 20000)->count();

            $this->dispatchBrowserEvent('update-pie');
        } else {

            $this->initializeData();
        }
    }

    public function render()
    {
        $this->updateCount();

        return view('livewire.pie-chart-graph');
    }
}
