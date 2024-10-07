@extends($activeTheme.'layouts.app')
@section('title', ___('Membership'))
@section('content')
    <div class="dashboard-box">
        <!-- Headline -->
        <div class="headline">
            <h3><i class="icon-feather-gift"></i> {{ ___('Current Plan') }}</h3>
        </div>
        <div class="content with-padding">
            <div class="table-responsive">
                <table id="js-table-list" class="basic-table dashboard-box-list">
                    <tr>
                        <th>{{ ___('Membership') }}</th>
                        <th>{{ ___('Start Date') }}</th>
                        <th>{{ ___('Expiry Date') }}</th>
                        <th>{{ ___('days_left') }}</th>
                       <th></th>
                    </tr>
                    <tr>
                        <td>{{ !empty($plan->translations->{get_lang()}->name)
                                        ? $plan->translations->{get_lang()}->name
                                        : $plan->name }}
                          
                        
                         </td>
                        <td>{{$start_date}}</td>
                        <td>{{$expiry_date}}</td>
                      <td>{{$planlastdate}}</td>
                        <td>
                            {{-- <form action="{{ route('subscription.cancel') }}" method="post">
                                @csrf
                                <button class="button" type="submit"><i class="fa fa-remove"></i> {{ ___('Cancel') }}</button>
                            </form> --}}
                        </td>
                   
                    </tr>
                    {{-- <tr>
                        <td colspan="7"><a href="{{ route('pricing') }}" class="button">{{ ___('Change Plan') }}</a></td>
                    </tr> --}}
                </table>
            </div>
        </div>
    </div>
@endsection
'plan', 'start_date', 'expiry_date',  'planlastdate'