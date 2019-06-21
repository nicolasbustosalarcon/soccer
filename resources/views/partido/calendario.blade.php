@extends ('layouts.app')

@section ('title', 'Torneos')

@section ('content')


<div class="container">
    <div class="row">
        <div class="span12">
            <table class="table-condensed table-bordered table-striped">
                <thead>
                    <tr>
                      <th colspan="7" >
                        <a class="btn"><i class="icon-chevron-left"></i></a>
                        <a class="btn">Enero</a>
                        <a class="btn"><i class="icon-chevron-right"></i></a>
                      </th>
                    </tr>
                    <tr>
                        <th>Lu</th>
                        <th>Ma</th>
                        <th>Mi</th>
                        <th>Ju</th>
                        <th>Vi</th>
                        <th>Sa</th>
                        <th>Do</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="muted">29</td>
                        <td class="muted">30</td>
                        <td class="muted">31</td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>13</td>
                        <td>14</td>
                        <td>15</td>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <td><strong>20</strong></td>
                        <td>21</td>
                        <td>22</td>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                    </tr>
                    <tr>
                        <td>26</td>
                        <td>27</td>
                        <td>28</td>
                        <td>29</td>
                        <td class="muted">1</td>
                        <td class="muted">2</td>
                        <td class="muted">3</td>
                    </tr>
                </tbody>
            </table>    
        </div>
    </div>
</div>
@endsection

